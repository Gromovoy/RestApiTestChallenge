<?php
namespace src\Services;

/**
 * Interface CollectionInterface
 * @package santon\Collection
 */
interface CollectionInterface extends \ArrayAccess, \Iterator, \Countable, \JsonSerializable
{
    /**
     * @return array
     */
    public function getArrayValues(): array;

    /**
     * @return array
     */
    public function getArrayKeys(): array;

    /**
     * @return $this
     */
    public function clear();

    /**
     * @param mixed $value
     * @return $this
     */
    public function push($value);

    /**
     * @return bool
     */
    public function isEmpty();

    /**
     * @param \Closure $filter
     * @return mixed
     */
    public function getOneValueByFilter(\Closure $filter);

    /**
     * @return array
     */
    public function toArray();

    /**
     * @param \Closure $closure Возвращает новый ключ
     * @return $this
     */
    public function changeKeys(\Closure $closure);

    /**
     * @param \Closure $closure
     * @param bool $saveKeys
     * @return bool
     */
    public function uasort(\Closure $closure, bool $saveKeys = true): bool;

    /**
     * @param \Closure $closure
     * @return static|CollectionInterface
     */
    public function filter(\Closure $closure);

    /**
     * @param int $offset
     * @param int|null $limit
     * @param bool $preserve_keys
     * @return $this
     */
    public function slice(int $offset, int $limit = null, $preserve_keys = false);

    /**
     * @return $this
     */
    public function shuffle();

    /**
     * __clone
     */
    public function __clone();
}
