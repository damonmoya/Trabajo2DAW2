<?php
 namespace MailPoetVendor\Symfony\Component\DependencyInjection\Loader\Configurator; if (!defined('ABSPATH')) exit; use MailPoetVendor\Symfony\Component\DependencyInjection\Argument\ArgumentInterface; use MailPoetVendor\Symfony\Component\DependencyInjection\Definition; use MailPoetVendor\Symfony\Component\DependencyInjection\Exception\InvalidArgumentException; use MailPoetVendor\Symfony\Component\DependencyInjection\Parameter; use MailPoetVendor\Symfony\Component\DependencyInjection\Reference; use MailPoetVendor\Symfony\Component\ExpressionLanguage\Expression; abstract class AbstractConfigurator { const FACTORY = 'unknown'; protected $definition; public function __call($method, $args) { if (\method_exists($this, 'set' . $method)) { return $this->{'set' . $method}(...$args); } throw new \BadMethodCallException(\sprintf('Call to undefined method "%s::%s()".', static::class, $method)); } public static function processValue($value, $allowServices = \false) { if (\is_array($value)) { foreach ($value as $k => $v) { $value[$k] = static::processValue($v, $allowServices); } return $value; } if ($value instanceof \MailPoetVendor\Symfony\Component\DependencyInjection\Loader\Configurator\ReferenceConfigurator) { return new \MailPoetVendor\Symfony\Component\DependencyInjection\Reference($value->id, $value->invalidBehavior); } if ($value instanceof \MailPoetVendor\Symfony\Component\DependencyInjection\Loader\Configurator\InlineServiceConfigurator) { $def = $value->definition; $value->definition = null; return $def; } if ($value instanceof self) { throw new \MailPoetVendor\Symfony\Component\DependencyInjection\Exception\InvalidArgumentException(\sprintf('"%s()" can be used only at the root of service configuration files.', $value::FACTORY)); } switch (\true) { case null === $value: case \is_scalar($value): return $value; case $value instanceof \MailPoetVendor\Symfony\Component\DependencyInjection\Argument\ArgumentInterface: case $value instanceof \MailPoetVendor\Symfony\Component\DependencyInjection\Definition: case $value instanceof \MailPoetVendor\Symfony\Component\ExpressionLanguage\Expression: case $value instanceof \MailPoetVendor\Symfony\Component\DependencyInjection\Parameter: case $value instanceof \MailPoetVendor\Symfony\Component\DependencyInjection\Reference: if ($allowServices) { return $value; } } throw new \MailPoetVendor\Symfony\Component\DependencyInjection\Exception\InvalidArgumentException(\sprintf('Cannot use values of type "%s" in service configuration files.', \is_object($value) ? \get_class($value) : \gettype($value))); } } 