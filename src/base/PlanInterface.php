<?php

namespace craft\commerce\base;

use craft\base\SavableComponentInterface;
use craft\commerce\models\payments\BasePaymentForm;
use craft\commerce\models\PaymentSource;
use craft\commerce\models\Transaction;
use craft\elements\User;
use craft\web\Response as WebResponse;

/**
 * PlanInterface defines the common interface to be implemented by plan classes.
 *
 * @author Pixel & Tonic, Inc. <support@pixelandtonic.com>
 * @since  2.0
 */
interface PlanInterface
{
    // Public Methods
    // =========================================================================

    /**
     * Return whether it's possible to switch to this plan from a different plan.
     *
     * @param PlanInterface $currentPlant
     *
     * @return bool
     */
    public function canSwitchFrom(PlanInterface $currentPlant): bool;
}