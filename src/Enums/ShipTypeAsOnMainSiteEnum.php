<?php

namespace CryptoWeb\InfoflotApi\Enums;

enum ShipTypeAsOnMainSiteEnum: string
{
	case SEA = 'seaAsOnMainSite';
	case RIVER = 'riverAsOnMainSite';
	case FROM_SOCHI = 'fromSochiAsOnMainSite';
	case TURKISH_RIVERA = 'turkishRivieraAsOnMainSite';
	case RIVER_FOREIGN = 'riverForeignAsOnMainSite';
}