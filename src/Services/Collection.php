<?php
namespace src\Services;
use Exception;


/**
 * Class Collection
 * @package santon\Collection
 */
class Collection implements CollectionInterface
{
    /** @var array */
    protected $values = [];

    /**
     * @return array
     */
    final public function getArrayValues(): array
    {
        return $this->values;
    }

    /**
     * @return array
     */
    final public function getArrayKeys(): array
    {
        return array_keys($this->values);
    }

    /**
     * @param mixed $offset
     * @return bool
     */
    public function offsetExists($offset)
    {
        return isset($this->values[$offset]);
    }

    /**
     * @param mixed $offset
     * @return mixed|null
     */
    public function offsetGet($offset)
    {
        return $this->offsetExists($offset) ? $this->values[$offset] : null;
    }

    /**
     * @param mixed $offset
     * @param mixed $value
     */
    public function offsetSet($offset, $value)
    {
        if ($offset === null)
        {
            $this->values[] = $value;
        }
        else
        {
            $this->values[$offset] = $value;
        }
    }

    /**
     * @param mixed $offset
     */
    public function offsetUnset($offset)
    {
        unset($this->values[$offset]);
    }

    /**
     * @return mixed
     */
    public function current()
    {
        return current($this->values);
    }

    /**
     * @return mixed
     */
    public function next()
    {
        return next($this->values);
    }

    /**
     * @return mixed
     */
    public function key()
    {
        return key($this->values);
    }

    /**
     * @return bool
     */
    public function valid()
    {
        return ($this->key() !== null);
    }

    /**
     * @return mixed
     */
    public function rewind()
    {
        return reset($this->values);
    }

    /**
     * @return int
     */
    public function count()
    {
        return count($this->values);
    }

    /**
     * @return $this
     */
    public function clear()
    {
        $this->values = [];
        return $this;
    }

    /**
     * @param mixed $value
     * @return $this
     */
    public function push($value)
    {
        $this->offsetSet(null, $value);
        return $this;
    }

    public function unshift($value)
    {
        array_unshift($this->values, $value);
        return $this;
    }

    public function reverse()
    {
        $this->values = array_reverse($this->values);
        return $this;
    }

    /**
     * @return bool
     */
    public function isEmpty()
    {
        return empty($this->values);
    }

    /**
     * @param \Closure $filter
     * @return mixed
     */
    public function getOneValueByFilter(\Closure $filter)
    {
        $values = array_values(array_filter($this->values, $filter));
        return !empty($values[0]) ? $values[0] : null;
    }

    /**
     * @return array
     */
    public function toArray()
    {
        return $this->values;
    }

    /**
     * @return array
     */
    public function jsonSerialize()
    {
        return $this->toArray();
    }

    /**
     * @param \Closure $closure Возвращает новый ключ
     * @return $this
     * @throws Exception
     */
    public function changeKeys(\Closure $closure)
    {
        $oldValues = $this->values;
        $oldCount = count($oldValues);
        $newValues = [];

        foreach ($oldValues as $value)
        {
            $key = $closure($value, $this);
            $newValues[$key] = $value;
        }

        $newCount = count($newValues);

        if ($newCount !== $oldCount)
        {
            throw new Exception('Изменилось кол-во элементов');
        }

        $this->values = $newValues;
        return $this;
    }

    /**
     * @param \Closure $closure
     * @param bool $saveKeys
     * @return bool
     */
    public function uasort(\Closure $closure, bool $saveKeys = true): bool
    {
        return $saveKeys ? uasort($this->values, $closure) : usort($this->values, $closure);
    }

    /**
     * @param \Closure $closure
     * @return static|CollectionInterface
     */
    public function filter(\Closure $closure)
    {
        $collection = clone $this;
        $collection->values = array_filter($collection->values, $closure);
        return $collection;
    }

    /**
     * @param int $offset
     * @param int|null $limit
     * @param bool $preserve_keys
     * @return $this
     */
    public function slice(int $offset, int $limit = null, $preserve_keys = false)
    {
        $collection = clone $this;
        $collection->values = array_slice($collection->values, $offset, $limit, $preserve_keys);
        return $collection;
    }

    /**
     * @return $this
     */
    public function shuffle()
    {
        $collection = clone $this;
        shuffle($collection->values);
        return $collection;
    }

    /**
     * __clone
     */
    public function __clone()
    {
        foreach ($this->values as $k => $value)
        {
            if (is_object($value))
            {
                $this->values[$k] = clone $value;
            }
        }
    }
}
