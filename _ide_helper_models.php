<?php

// @formatter:off
/**
 * A helper file for your Eloquent Models
 * Copy the phpDocs from this file to the correct Model,
 * And remove them from this file, to prevent double declarations.
 *
 * @author Barry vd. Heuvel <barryvdh@gmail.com>
 */


namespace App\Models{
/**
 * App\Models\Address
 *
 * @property string $id
 * @property string $user_id
 * @property string $province_id
 * @property string $city_id
 * @property string $line
 * @property string|null $building_number
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\City|null $city
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\DeliveryService> $deliveryService
 * @property-read int|null $delivery_service_count
 * @property-read \App\Models\Province|null $province
 * @property-read \App\Models\User|null $user
 * @method static \Database\Factories\AddressFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder|Address newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Address newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Address query()
 * @method static \Illuminate\Database\Eloquent\Builder|Address whereBuildingNumber($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Address whereCityId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Address whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Address whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Address whereLine($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Address whereProvinceId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Address whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Address whereUserId($value)
 */
	class Address extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Cart
 *
 * @property string $id
 * @property string $user_id
 * @property string $product_id
 * @property int $quantity
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Product|null $product
 * @property-read \App\Models\User|null $user
 * @method static \Database\Factories\CartFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder|Cart newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Cart newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Cart query()
 * @method static \Illuminate\Database\Eloquent\Builder|Cart whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Cart whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Cart whereProductId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Cart whereQuantity($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Cart whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Cart whereUserId($value)
 */
	class Cart extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Category
 *
 * @property string $id
 * @property string $name
 * @property string $slug
 * @property string $thumbnail
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Product> $products
 * @property-read int|null $products_count
 * @method static \Database\Factories\CategoryFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder|Category newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Category newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Category query()
 * @method static \Illuminate\Database\Eloquent\Builder|Category whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Category whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Category whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Category whereSlug($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Category whereThumbnail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Category whereUpdatedAt($value)
 */
	class Category extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\City
 *
 * @property string $city_id
 * @property string $province_id
 * @property string|null $province
 * @property string|null $type
 * @property string|null $city_name
 * @property string|null $postal_code
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Province|null $prov
 * @method static \Illuminate\Database\Eloquent\Builder|City newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|City newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|City query()
 * @method static \Illuminate\Database\Eloquent\Builder|City whereCityId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|City whereCityName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|City whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|City wherePostalCode($value)
 * @method static \Illuminate\Database\Eloquent\Builder|City whereProvince($value)
 * @method static \Illuminate\Database\Eloquent\Builder|City whereProvinceId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|City whereType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|City whereUpdatedAt($value)
 */
	class City extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Coupon
 *
 * @property string $id
 * @property string $code
 * @property int $amount
 * @property string $expire_at
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Database\Factories\CouponFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder|Coupon newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Coupon newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Coupon query()
 * @method static \Illuminate\Database\Eloquent\Builder|Coupon whereAmount($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Coupon whereCode($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Coupon whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Coupon whereExpireAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Coupon whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Coupon whereUpdatedAt($value)
 */
	class Coupon extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Courier
 *
 * @property string $id
 * @property string $code
 * @property string $title
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Database\Factories\CourierFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder|Courier newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Courier newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Courier query()
 * @method static \Illuminate\Database\Eloquent\Builder|Courier whereCode($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Courier whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Courier whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Courier whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Courier whereUpdatedAt($value)
 */
	class Courier extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\DeliveryService
 *
 * @property string $id
 * @property string $order_id
 * @property string $address_id
 * @property string $name
 * @property string $description
 * @property string $cost
 * @property string $estimated_day
 * @property string|null $note
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Address|null $address
 * @property-read \App\Models\Order|null $order
 * @method static \Illuminate\Database\Eloquent\Builder|DeliveryService newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|DeliveryService newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|DeliveryService query()
 * @method static \Illuminate\Database\Eloquent\Builder|DeliveryService whereAddressId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|DeliveryService whereCost($value)
 * @method static \Illuminate\Database\Eloquent\Builder|DeliveryService whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|DeliveryService whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|DeliveryService whereEstimatedDay($value)
 * @method static \Illuminate\Database\Eloquent\Builder|DeliveryService whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|DeliveryService whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|DeliveryService whereNote($value)
 * @method static \Illuminate\Database\Eloquent\Builder|DeliveryService whereOrderId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|DeliveryService whereUpdatedAt($value)
 */
	class DeliveryService extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Discount
 *
 * @property string $id
 * @property string $product_id
 * @property int $amount
 * @property string|null $description
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Product|null $product
 * @method static \Database\Factories\DiscountFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder|Discount newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Discount newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Discount query()
 * @method static \Illuminate\Database\Eloquent\Builder|Discount whereAmount($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Discount whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Discount whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Discount whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Discount whereProductId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Discount whereUpdatedAt($value)
 */
	class Discount extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\EmailVerification
 *
 * @property string $id
 * @property string $user_id
 * @property string $expires_at
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\User|null $user
 * @method static \Illuminate\Database\Eloquent\Builder|EmailVerification newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|EmailVerification newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|EmailVerification query()
 * @method static \Illuminate\Database\Eloquent\Builder|EmailVerification whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|EmailVerification whereExpiresAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|EmailVerification whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|EmailVerification whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|EmailVerification whereUserId($value)
 */
	class EmailVerification extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Order
 *
 * @property string $id
 * @property string $user_id
 * @property string $number
 * @property string $total_price
 * @property string $payment_status
 * @property string|null $snap_token
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\DeliveryService|null $deliveryService
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\OrderItem> $items
 * @property-read int|null $items_count
 * @property-read \App\Models\User|null $user
 * @method static \Illuminate\Database\Eloquent\Builder|Order newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Order newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Order query()
 * @method static \Illuminate\Database\Eloquent\Builder|Order whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Order whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Order whereNumber($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Order wherePaymentStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Order whereSnapToken($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Order whereTotalPrice($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Order whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Order whereUserId($value)
 */
	class Order extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\OrderItem
 *
 * @property string $id
 * @property string $order_id
 * @property string $product_id
 * @property int $quantity
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Order|null $order
 * @property-read \App\Models\Product|null $product
 * @method static \Illuminate\Database\Eloquent\Builder|OrderItem newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|OrderItem newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|OrderItem query()
 * @method static \Illuminate\Database\Eloquent\Builder|OrderItem whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|OrderItem whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|OrderItem whereOrderId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|OrderItem whereProductId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|OrderItem whereQuantity($value)
 * @method static \Illuminate\Database\Eloquent\Builder|OrderItem whereUpdatedAt($value)
 */
	class OrderItem extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\PasswordRequest
 *
 * @property string $id
 * @property string $email
 * @property string $token
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|PasswordRequest newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|PasswordRequest newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|PasswordRequest query()
 * @method static \Illuminate\Database\Eloquent\Builder|PasswordRequest whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PasswordRequest whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PasswordRequest whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PasswordRequest whereToken($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PasswordRequest whereUpdatedAt($value)
 */
	class PasswordRequest extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Product
 *
 * @property string $id
 * @property string $category_id
 * @property string $sku
 * @property string $name
 * @property int $price
 * @property string $overview
 * @property string $description
 * @property string|null $additional_info
 * @property int $weight
 * @property string|null $size
 * @property string|null $gender
 * @property int|null $quantity
 * @property int $is_ready
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Cart> $carts
 * @property-read int|null $carts_count
 * @property-read \App\Models\Category|null $category
 * @property-read \App\Models\Discount|null $discount
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\ProductImage> $images
 * @property-read int|null $images_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\OrderItem> $orderItems
 * @property-read int|null $order_items_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\ProductRating> $ratings
 * @property-read int|null $ratings_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\ProductReview> $reviews
 * @property-read int|null $reviews_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\ProductSold> $solds
 * @property-read int|null $solds_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\ProductView> $views
 * @property-read int|null $views_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\VoucherItem> $voucherItems
 * @property-read int|null $voucher_items_count
 * @method static \Database\Factories\ProductFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder|Product newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Product newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Product query()
 * @method static \Illuminate\Database\Eloquent\Builder|Product whereAdditionalInfo($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Product whereCategoryId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Product whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Product whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Product whereGender($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Product whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Product whereIsReady($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Product whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Product whereOverview($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Product wherePrice($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Product whereQuantity($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Product whereSize($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Product whereSku($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Product whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Product whereWeight($value)
 */
	class Product extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\ProductImage
 *
 * @property string $id
 * @property string $product_id
 * @property string $url
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Product|null $product
 * @method static \Database\Factories\ProductImageFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder|ProductImage newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ProductImage newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ProductImage query()
 * @method static \Illuminate\Database\Eloquent\Builder|ProductImage whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ProductImage whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ProductImage whereProductId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ProductImage whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ProductImage whereUrl($value)
 */
	class ProductImage extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\ProductRating
 *
 * @property string $id
 * @property string $product_id
 * @property string $user_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Product|null $product
 * @property-read \App\Models\User|null $user
 * @method static \Illuminate\Database\Eloquent\Builder|ProductRating newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ProductRating newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ProductRating query()
 * @method static \Illuminate\Database\Eloquent\Builder|ProductRating whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ProductRating whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ProductRating whereProductId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ProductRating whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ProductRating whereUserId($value)
 */
	class ProductRating extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\ProductReview
 *
 * @property string $id
 * @property string $user_id
 * @property string $product_id
 * @property string $body
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Product|null $product
 * @property-read \App\Models\User|null $user
 * @method static \Database\Factories\ProductReviewFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder|ProductReview newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ProductReview newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ProductReview query()
 * @method static \Illuminate\Database\Eloquent\Builder|ProductReview whereBody($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ProductReview whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ProductReview whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ProductReview whereProductId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ProductReview whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ProductReview whereUserId($value)
 */
	class ProductReview extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\ProductSold
 *
 * @property string $id
 * @property string $user_id
 * @property string $product_id
 * @property int $quantity
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Product|null $product
 * @property-read \App\Models\User|null $user
 * @method static \Database\Factories\ProductSoldFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder|ProductSold newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ProductSold newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ProductSold query()
 * @method static \Illuminate\Database\Eloquent\Builder|ProductSold whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ProductSold whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ProductSold whereProductId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ProductSold whereQuantity($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ProductSold whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ProductSold whereUserId($value)
 */
	class ProductSold extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\ProductView
 *
 * @property string $id
 * @property string $product_id
 * @property string $ip_address
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Product|null $product
 * @method static \Database\Factories\ProductViewFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder|ProductView newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ProductView newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ProductView query()
 * @method static \Illuminate\Database\Eloquent\Builder|ProductView whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ProductView whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ProductView whereIpAddress($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ProductView whereProductId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ProductView whereUpdatedAt($value)
 */
	class ProductView extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Province
 *
 * @property string $province_id
 * @property string|null $province
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Address> $address
 * @property-read int|null $address_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\City> $cities
 * @property-read int|null $cities_count
 * @method static \Illuminate\Database\Eloquent\Builder|Province newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Province newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Province query()
 * @method static \Illuminate\Database\Eloquent\Builder|Province whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Province whereProvince($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Province whereProvinceId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Province whereUpdatedAt($value)
 */
	class Province extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\User
 *
 * @property string $id
 * @property string $name
 * @property string $phone
 * @property string $email
 * @property string|null $phone_verified_at
 * @property \Illuminate\Support\Carbon|null $email_verified_at
 * @property string $password
 * @property string $gender
 * @property string|null $photo
 * @property int $point
 * @property int $active
 * @property string|null $remember_token
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\EmailVerification> $emailVerifications
 * @property-read int|null $email_verifications_count
 * @property-read \Illuminate\Notifications\DatabaseNotificationCollection<int, \Illuminate\Notifications\DatabaseNotification> $notifications
 * @property-read int|null $notifications_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Order> $orders
 * @property-read int|null $orders_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\ProductReview> $productReviews
 * @property-read int|null $product_reviews_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Cart> $productsInCart
 * @property-read int|null $products_in_cart_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\ProductSold> $purchasedProducts
 * @property-read int|null $purchased_products_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\ProductRating> $ratedProducts
 * @property-read int|null $rated_products_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Address> $shippingAddress
 * @property-read int|null $shipping_address_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \Laravel\Sanctum\PersonalAccessToken> $tokens
 * @property-read int|null $tokens_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Wish> $wishedProducts
 * @property-read int|null $wished_products_count
 * @method static \Database\Factories\UserFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder|User newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|User newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|User query()
 * @method static \Illuminate\Database\Eloquent\Builder|User whereActive($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereEmailVerifiedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereGender($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User wherePassword($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User wherePhone($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User wherePhoneVerifiedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User wherePhoto($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User wherePoint($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereRememberToken($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereUpdatedAt($value)
 */
	class User extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Voucher
 *
 * @property string $id
 * @property string $voucher_item_id
 * @property string $code
 * @property string $valid_until
 * @property int $claimed
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\VoucherItem|null $item
 * @method static \Database\Factories\VoucherFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder|Voucher newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Voucher newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Voucher query()
 * @method static \Illuminate\Database\Eloquent\Builder|Voucher whereClaimed($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Voucher whereCode($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Voucher whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Voucher whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Voucher whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Voucher whereValidUntil($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Voucher whereVoucherItemId($value)
 */
	class Voucher extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\VoucherItem
 *
 * @property string $id
 * @property string $product_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Product|null $product
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Voucher> $voucher
 * @property-read int|null $voucher_count
 * @method static \Database\Factories\VoucherItemFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder|VoucherItem newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|VoucherItem newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|VoucherItem query()
 * @method static \Illuminate\Database\Eloquent\Builder|VoucherItem whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|VoucherItem whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|VoucherItem whereProductId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|VoucherItem whereUpdatedAt($value)
 */
	class VoucherItem extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Wish
 *
 * @property string $id
 * @property string $user_id
 * @property string $product_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\User|null $user
 * @method static \Database\Factories\WishFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder|Wish newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Wish newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Wish query()
 * @method static \Illuminate\Database\Eloquent\Builder|Wish whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Wish whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Wish whereProductId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Wish whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Wish whereUserId($value)
 */
	class Wish extends \Eloquent {}
}

