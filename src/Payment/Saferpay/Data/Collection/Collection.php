<?php

namespace Payment\Saferpay\Data\Collection;

/**
 * ATTENTION: each collection item can override the fieldsnames and/or the request url
 */
class Collection implements CollectionItemInterface
{
    /**
     * @var string
     */
    protected $requestUrl;

    /**
     * @var string
     */
    protected $name;

    /**
     * @var CollectionItemInterface[]
     */
    protected $collectionItems;

    /**
     * @var array
     */
    protected $fieldsOfCollectionItems;

    /**
     * @var array
     */
    protected $invalidData;

    public function __construct($requestUrl, $name = 'collection')
    {
        $this->requestUrl = $requestUrl;
        $this->name = $name;
        $this->collectionItems = array();
        $this->fieldsOfCollectionItems = array();
        $this->invalidData = array();
    }

    /**
     * @param CollectionItemInterface $collectionItem
     * @return $this
     */
    public function addCollectionItem(CollectionItemInterface $collectionItem)
    {
        if (!in_array($collectionItem, $this->collectionItems)) {
            $this->collectionItems[$collectionItem->getName()] = $collectionItem;
            foreach ($collectionItem->getFieldNames() as $fieldname) {
                $this->fieldsOfCollectionItems[$fieldname] = $collectionItem->getName();
            }
        }

        return $this;
    }

    /**
     * @param string $fieldName
     * @param mixed  $fieldValue
     * @return $this
     * @throws \InvalidArgumentException
     */
    public function set($fieldName, $fieldValue)
    {
        if (array_key_exists($fieldName, $this->fieldsOfCollectionItems)) {
            $collectionItem = $this->collectionItems[$this->fieldsOfCollectionItems[$fieldName]];
            $collectionItem->set($fieldName, $fieldValue);
        } else {
            $this->invalidData[$fieldName] = $fieldValue;
        }

        return $this;
    }

    /**
     * @param  string                    $fieldName
     * @return mixed
     * @throws \InvalidArgumentException
     */
    public function get($fieldName)
    {
        if (array_key_exists($fieldName, $this->fieldsOfCollectionItems)) {
            $collectionItem = $this->collectionItems[$this->fieldsOfCollectionItems[$fieldName]];

            return $collectionItem->get($fieldName);
        }

        throw new \InvalidArgumentException("Unknown fieldname '{$fieldName}'");
    }

    /**
     * @return array
     */
    public function getData()
    {
        $data = array();
        foreach ($this->collectionItems as $collectionItem) {
            $data = array_replace_recursive($data, $collectionItem->getData());
        }

        return $data;
    }

    /**
     * @return mixed
     */
    public function getInvalidData()
    {
        $invalidData = $this->invalidData;
        foreach ($this->collectionItems as $collectionItem) {
            $invalidData = array_replace_recursive($invalidData, $collectionItem->getInvalidData());
        }

        return $invalidData;
    }

    /**
     * @return string
     */
    public function getRequestUrl()
    {
        return $this->requestUrl;
    }

    /**
     * @return array
     */
    public function getFieldNames()
    {
        return array_keys($this->fieldsOfCollectionItems);
    }

    /**
     * @return string
     */
    public function getName()
    {
        return (string) $this->name;
    }
}
