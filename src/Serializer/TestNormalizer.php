<?php


namespace App\Serializer;


use Symfony\Component\Serializer\Normalizer\CacheableSupportsMethodInterface;
use Symfony\Component\Serializer\Normalizer\ContextAwareDenormalizerInterface;
use Symfony\Component\Serializer\Normalizer\DenormalizerAwareInterface;
use Symfony\Component\Serializer\Normalizer\DenormalizerAwareTrait;

final class TestNormalizer implements ContextAwareDenormalizerInterface, DenormalizerAwareInterface, CacheableSupportsMethodInterface
{
  use DenormalizerAwareTrait;

  private const ALREADY_CALLED = 'TEST_NORMALIZER_ALREADY_CALLED';

  /**
   * @param mixed $data
   * @param string $type
   * @param string|null $format
   * @param array $context
   * @return array|object
   * @throws \Symfony\Component\Serializer\Exception\ExceptionInterface
   */
  public function denormalize($data, string $type, string $format = null, array $context = [])
  {

    $context[self::ALREADY_CALLED] = true;

//    if ($type === 'App\Entity\MappedSuperclass') {
//      $class = 'App\Entity\\' . $data['@type'];
//      $context['resource_class'] = $class;
//    }
//
//    $context[self::ALREADY_CALLED] = true;
//
//    $result = $this->denormalizer->denormalize($data, 'App\Entity\\' . $data['@type'], $format, $context);
//    return $result;

    return $this->denormalizer->denormalize($data, $type, $format, $context);
  }

  /**
   * @param $data
   * @param string $type
   * @param string|null $format
   * @param array $context
   * @return bool
   */
  public function supportsDenormalization($data, string $type, string $format = null, array $context = [])
  {
    if (isset($context[self::ALREADY_CALLED])) {
      return false;
    }

//    return $type == 'App\Entity\MappedSuperclass';

    return $this->denormalizer->supportsDenormalization($data, $type, $format);
  }

  /**
   * @return bool
   */
  public function hasCacheableSupportsMethod(): bool
  {
    return false;
  }
}