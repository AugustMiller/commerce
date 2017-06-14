<?php

namespace craft\commerce\records;

use craft\db\ActiveRecord;
use craft\records\UserGroup;
use yii\db\ActiveQueryInterface;

/**
 * Discount record.
 *
 * @property int           $id
 * @property string        $name
 * @property string        $description
 * @property string        $code
 * @property int           $perUserLimit
 * @property int           $perEmailLimit
 * @property int           $totalUseLimit
 * @property int           $totalUses
 * @property \DateTime     $dateFrom
 * @property \DateTime     $dateTo
 * @property int           $purchaseTotal
 * @property int           $purchaseQty
 * @property int           $maxPurchaseQty
 * @property float         $baseDiscount
 * @property float         $perItemDiscount
 * @property float         $percentDiscount
 * @property bool          $excludeOnSale
 * @property bool          $freeShipping
 * @property bool          $allGroups
 * @property bool          $allProducts
 * @property bool          $allProductTypes
 * @property bool          $enabled
 * @property bool          $stopProcessing
 * @property bool          $sortOrder
 *
 * @property Product[]     $products
 * @property ProductType[] $productTypes
 * @property UserGroup[]   $groups
 *
 * @author    Pixel & Tonic, Inc. <support@pixelandtonic.com>
 * @copyright Copyright (c) 2015, Pixel & Tonic, Inc.
 * @license   https://craftcommerce.com/license Craft Commerce License Agreement
 * @see       https://craftcommerce.com
 * @package   craft.plugins.commerce.records
 * @since     1.0
 */
class Discount extends ActiveRecord
{
    /**
     * @return string
     */
    public static function tableName()
    {
        return '{{%commerce_discounts}}';
    }

    public function getDiscountUserGroups(): ActiveQueryInterface
    {
        return $this->hasMany(DiscountUserGroup::class, ['discountId' => 'id']);
    }

    public function getDiscountProducts(): ActiveQueryInterface
    {
        return $this->hasMany(DiscountProduct::class, ['discountId' => 'id']);
    }

    public function getDiscountProductTypes(): ActiveQueryInterface
    {
        return $this->hasMany(DiscountProductType::class, ['discountId' => 'id']);
    }

    public function getGroups(): ActiveQueryInterface
    {
        return $this->hasMany(UserGroup::class, ['id' => 'discountId'])->via('discountUserGroups');
    }

    public function getProducts(): ActiveQueryInterface
    {
        return $this->hasMany(Product::class, ['id' => 'discountId'])->via('discountProducts');
    }

    public function getProductTypes(): ActiveQueryInterface
    {
        return $this->hasMany(ProductType::class, ['id' => 'discountId'])->via('discountProductTypes');
    }
}