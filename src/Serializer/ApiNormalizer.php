<?php
// api/src/Serializer/ApiNormalizer

namespace App\Serializer;

use Symfony\Component\Serializer\Normalizer\DenormalizerInterface;
use Symfony\Component\Serializer\Normalizer\NormalizerInterface;
use Symfony\Component\Serializer\SerializerAwareInterface;
use Symfony\Component\Serializer\SerializerInterface;
use Symfony\Component\Serializer\Normalizer\AbstractObjectNormalizer;

final class ApiNormalizer implements NormalizerInterface, DenormalizerInterface, SerializerAwareInterface
{
  private $decorated;

  public function __construct(NormalizerInterface $decorated)
  {
    if (!$decorated instanceof DenormalizerInterface) {
      throw new \InvalidArgumentException(sprintf('The decorated normalizer must implement the %s.', DenormalizerInterface::class));
    }

    $this->decorated = $decorated;
  }

  public function supportsNormalization($data, $format = null)
  {
    return $this->decorated->supportsNormalization($data, $format);
  }

  public function normalize($object, $format = null, array $context = [])
  {
    $context[AbstractObjectNormalizer::ENABLE_MAX_DEPTH] = TRUE;
    $data = $this->decorated->normalize($object, $format, $context);

    return $data;
  }

  public function supportsDenormalization($data, $type, $format = null)
  {
    //dump($data);
    //dump($type);
    //dump($format);
    //dump($this->decorated->supportsDenormalization($data, $type, $format));
    return $this->decorated->supportsDenormalization($data, $type, $format);
  }

  public function denormalize($data, $class, $format = null, array $context = [])
  {
//    if ($class === 'App\Entity\MappedSuperclass') {
//      $class = 'App\Entity\\' . $data['@type'];
//      $context['resource_class'] = $class;
//    }
    return $this->decorated->denormalize($data, $class, $format, $context);
  }

  public function setSerializer(SerializerInterface $serializer)
  {
    if($this->decorated instanceof SerializerAwareInterface) {
      $this->decorated->setSerializer($serializer);
    }
  }
}