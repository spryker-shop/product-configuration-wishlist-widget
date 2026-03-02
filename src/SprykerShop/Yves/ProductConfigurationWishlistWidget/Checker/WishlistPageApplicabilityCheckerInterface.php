<?php

/**
 * Copyright © 2016-present Spryker Systems GmbH. All rights reserved.
 * Use of this software requires acceptance of the Evaluation License Agreement. See LICENSE file.
 */

namespace SprykerShop\Yves\ProductConfigurationWishlistWidget\Checker;

use Generated\Shared\Transfer\ProductConfiguratorRequestTransfer;
use Generated\Shared\Transfer\ProductConfiguratorResponseTransfer;

interface WishlistPageApplicabilityCheckerInterface
{
    public function isRequestApplicable(ProductConfiguratorRequestTransfer $productConfiguratorRequestTransfer): bool;

    public function isResponseApplicable(ProductConfiguratorResponseTransfer $productConfiguratorResponseTransfer): bool;
}
