<?php

namespace App\Enums;

enum NewsTypeEnum:int {
    case NEW_PRODUCTS = 1;
    case INDUSTRY_NEWS = 2;
    case EXHIBITION_NEWS = 3;
    case COMPANY_NEWS = 4;
    case CERTIFICATION = 5;
}
