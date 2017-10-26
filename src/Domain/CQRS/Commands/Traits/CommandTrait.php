<?php namespace Domain\CQRS\Commands\Traits;

use Illuminate\Support\Facades\App;
use InvalidArgumentException;
use ReflectionClass;

/**
 * Trait CommandTrait
 * @package Domain\CQRS\Commands\Traits
 */
trait CommandTrait
{
    /**
     * @param $command
     */
    protected function execute($command)
    {
        $bus = $this->getCommandBus();
        $bus->execute($command);
    }

    /**
     * @return mixed
     */
    public function getCommandBus()
    {
        return App::make('Domain\CQRS\Commands\Bus\CommandBus');
    }

    /**
     * Map an array of input to a command's properties.
     *
     * @param  string $command
     * @param  array $input
     * @throws InvalidArgumentException
     * @author Taylor Otwell
     *
     * @return mixed
     */
    protected function mapInputToCommand($command, array $input)
    {
        $dependencies = [];
        $class = new ReflectionClass($command);
        foreach ($class->getConstructor()->getParameters() as $parameter) {
            $name = $parameter->getName();
            if (array_key_exists($name, $input)) {
                $dependencies[] = $input[$name];
            } elseif ($parameter->isDefaultValueAvailable()) {
                $dependencies[] = $parameter->getDefaultValue();
            } else {
                throw new InvalidArgumentException("Unable to map input to command: {$name}");
            }
        }
        return $class->newInstanceArgs($dependencies);
    }
}