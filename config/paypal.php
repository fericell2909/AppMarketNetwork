<?php
return array(
    // set your paypal credential
    'client_id' => 'AdSxBTnxAt3H_yLf8hD2cSYvs10CE2gPv_7MOF_H-aWApDpuKkK3wPIt06znozmLJpH5tOH4U_YLduMn',
    'secret' => 'ENq8KGyuhBAXzJ43mU-Y80hvQzK4OSKaRRfEom5sVsHgHPiWFiyZOBo9lWRNNSJcPTaIEgCY2NkgCa5C',
    /**
     * SDK configuration 
     */
    'settings' => array(
        /**
         * Available option 'sandbox' or 'live'
         */
        'mode' => 'sandbox',
        /**
         * Specify the max request time in seconds
         */
        'http.ConnectionTimeOut' => 30,
        /**
         * Whether want to log to a file
         */
        'log.LogEnabled' => true,
        /**
         * Specify the file that want to write on
         */
        'log.FileName' => storage_path() . '/logs/paypal.log',
        /**
         * Available option 'FINE', 'INFO', 'WARN' or 'ERROR'
         *
         * Logging is most verbose in the 'FINE' level and decreases as you
         * proceed towards ERROR
         */
        'log.LogLevel' => 'FINE'
    ),
);