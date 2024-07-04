<?php

namespace CryptoWeb\InfoflotApi\Enums;

enum CruiseSortEnum: string
{
	case DATE = 'date';
	case DATE_ASC = 'date-asc';
	case DATE_DESC = 'date-desc';
	case PRICE = 'price';
	case PRICE_ASC = 'price-asc';
	case LENGTH = 'length';
	case LENGTH_ASC = 'length-asc';
	case LENGTH_DESC = 'length-desc';
}