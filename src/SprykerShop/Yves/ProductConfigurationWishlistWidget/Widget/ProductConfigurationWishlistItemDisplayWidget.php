<?php

/**
 * Copyright © 2016-present Spryker Systems GmbH. All rights reserved.
 * Use of this software requires acceptance of the Evaluation License Agreement. See LICENSE file.
 */

namespace SprykerShop\Yves\ProductConfigurationWishlistWidget\Widget;

use Generated\Shared\Transfer\WishlistItemTransfer;
use Spryker\Yves\Kernel\Widget\AbstractWidget;

/**
 * @method \SprykerShop\Yves\ProductConfigurationWishlistWidget\ProductConfigurationWishlistWidgetFactory getFactory()
 * @method \SprykerShop\Yves\ProductConfigurationWishlistWidget\ProductConfigurationWishlistWidgetConfig getConfig()
 */
class ProductConfigurationWishlistItemDisplayWidget extends AbstractWidget
{
    /**
     * @var string
     */
    protected const PARAMETER_IS_VISIBLE = 'isVisible';

    /**
     * @var string
     */
    protected const PARAMETER_PRODUCT_CONFIGURATION_INSTANCE = 'productConfigurationInstance';

    /**
     * @var string
     */
    protected const PARAMETER_PRODUCT_CONFIGURATION_TEMPLATE = 'productConfigurationTemplate';

    public function __construct(WishlistItemTransfer $wishlistItemTransfer)
    {
        $this->addIsVisibleParameter($wishlistItemTransfer);

        if (!$wishlistItemTransfer->getProductConfigurationInstance()) {
            return;
        }

        $this->addProductConfigurationInstanceParameter($wishlistItemTransfer);
        $this->addProductConfigurationTemplateParameter($wishlistItemTransfer);
    }

    public static function getName(): string
    {
        return 'ProductConfigurationWishlistItemDisplayWidget';
    }

    public static function getTemplate(): string
    {
        return '@ProductConfigurationWishlistWidget/views/wishlist-item-configuration/wishlist-item-configuration.twig';
    }

    protected function addIsVisibleParameter(WishlistItemTransfer $wishlistItemTransfer): void
    {
        $this->addParameter(static::PARAMETER_IS_VISIBLE, $wishlistItemTransfer->getProductConfigurationInstance() !== null);
    }

    protected function addProductConfigurationInstanceParameter(WishlistItemTransfer $wishlistItemTransfer): void
    {
        $this->addParameter(static::PARAMETER_PRODUCT_CONFIGURATION_INSTANCE, $wishlistItemTransfer->getProductConfigurationInstanceOrFail());
    }

    protected function addProductConfigurationTemplateParameter(WishlistItemTransfer $wishlistItemTransfer): void
    {
        $productConfigurationTemplateTransfer = $this->getFactory()
            ->createProductConfigurationTemplateResolver()
            ->resolveProductConfigurationTemplate($wishlistItemTransfer->getProductConfigurationInstanceOrFail());

        $this->addParameter(static::PARAMETER_PRODUCT_CONFIGURATION_TEMPLATE, $productConfigurationTemplateTransfer);
    }
}
