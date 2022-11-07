<?php

namespace Omnipay\Telcell;

use Omnipay\Common\AbstractGateway;
use Omnipay\Telcell\Message\CompletePurchaseRequest;
use Omnipay\Telcell\Message\PurchaseRequest;

/**
 * Braintree Gateway
 */
class Gateway extends AbstractGateway
{
    public const TRANSACTION_STATUS_NEW                  = 'NEW';                  // - счёт выставлен, но не оплачен.
    public const TRANSACTION_STATUS_PAID                 = 'PAID';                 // - счёт успешно оплачен.
    public const TRANSACTION_STATUS_REJECTED             = 'REJECTED';             // - счёт отклонён получателем.
    public const TRANSACTION_STATUS_EXPIRED              = 'EXPIRED';              // - истекло время действия счёта.
    public const TRANSACTION_STATUS_CANCELLED            = 'CANCELLED';            // - счёт отменён персоналом системы.
    public const TRANSACTION_STATUS_CANCELLED_FOR_REPEAT = 'CANCELLED FOR REPEAT'; // – счёт отменен для повторного выставления

    /**
     * Get name
     *
     * @return string
     */
    public function getName()
    {
        return 'Telcell';
    }

    /**
     * Get default parameters
     *
     * @return array|\Illuminate\Config\Repository|mixed
     */
    public function getDefaultParameters()
    {
        return [
            'shop_id'  => '',
            'shop_key' => '',
        ];
    }

    /**
     * Sets the request account ID.
     *
     * @param  string  $value
     *
     * @return $this
     */
    public function setShopId($value)
    {
        return $this->setParameter('shop_id', $value);
    }

    /**
     * Get the request account ID.
     *
     * @return mixed
     */
    public function getShoptId()
    {
        return $this->getParameter('shop_id');
    }

    /**
     * Sets the request secret key.
     *
     * @param  string  $value
     *
     * @return $this
     */
    public function setShopKey($value)
    {
        return $this->setParameter('shop_key', $value);
    }

    /**
     * Get the request secret key.
     *
     * @return mixed
     */
    public function getShopKey()
    {
        return $this->getParameter('shop_key');
    }

    /**
     * Sets the request language.
     *
     * @param  string  $value
     *
     * @return $this
     */
    public function setLanguage($value)
    {
        return $this->setParameter('language', $value);
    }

    /**
     * Get the request language.
     *
     * @return $this
     */
    public function getLanguage()
    {
        return $this->getParameter('language');
    }

    /**
     * Create a purchase request
     *
     * @param  array  $options
     *
     * @return \Omnipay\Common\Message\AbstractRequest|\Omnipay\Common\Message\RequestInterface
     */
    public function purchase(array $options = [])
    {
        return $this->createRequest(PurchaseRequest::class, $options);
    }

    /**
     * Complete purchase
     *
     * @param  array  $options
     *
     * @return \Omnipay\Common\Message\AbstractRequest|\Omnipay\Common\Message\RequestInterface
     */
    public function completePurchase(array $options = [])
    {
        return $this->createRequest(CompletePurchaseRequest::class, $options);
    }
}
