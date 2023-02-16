<?php

namespace App\Enums;

enum PaymentStatusEnum: string
{
    case PENDING = 'pending';
    case PAID = 'paid';
    case EXPIRE = 'expire';
    case CANCELED = 'canceled';
}
