<?php

namespace FondOfSpryker\Zed\OmsOctopusPayoneConnector\Persistence;

use Orm\Zed\Payment\Persistence\SpySalesPaymentQuery;
use Orm\Zed\Payone\Persistence\SpyPaymentPayoneQuery;
use SprykerEco\Zed\Payone\Persistence\PayoneQueryContainerInterface as SprykerEcoPayoneQueryContainerInterface;

interface OmsOctopusPayoneConnectorQueryContainerInterface extends SprykerEcoPayoneQueryContainerInterface
{
    /**
     * @param int $idSalesPayment
     *
     * @return \Orm\Zed\Payment\Persistence\SpySalesPaymentQuery
     */
    public function querySalesPaymentByIdSalesPayment(int $idSalesPayment): SpySalesPaymentQuery;

    /**
     * @param int $idSalesOrder
     *
     * @return \Orm\Zed\Payone\Persistence\SpyPaymentPayoneQuery
     */
    public function queryPaymentPayoneByIdSalesOrder(int $idSalesOrder): SpyPaymentPayoneQuery;
}
