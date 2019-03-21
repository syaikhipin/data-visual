<?php
/*
 * @ PHP 5.6
 * @ Decoder version : 1.0.0.1
 * @ Release on : 24.03.2018
 * @ Website    : http://EasyToYou.eu
 */

/*
 * @ PHP 5.6
 * @ Decoder version : 1.0.0.1
 * @ Release on : 24.03.2018
 * @ Website    : http://EasyToYou.eu
 */
namespace IP2Location;

/**
 * IP2Location database class
 *
 */
class Database
{
    /**
     * Column offset mapping
     *
     * Each entry contains an array mapping databse version (0--23) to offset within a record.
     * A value of 0 means the column is not present in the given database version.
     *
     * @access private
     * @static
     * @var array
     */
    private static $columns = NULL;
    /**
     * Column name mapping
     *
     * @access private
     * @static
     * @var array
     */
    private static $names = NULL;
    /**
     * Database names, in order of preference for file lookup
     *
     * @var array
     */
    private static $databases = array("IP-COUNTRY-REGION-CITY-LATITUDE-LONGITUDE-ZIPCODE-TIMEZONE-ISP-DOMAIN-NETSPEED-AREACODE-WEATHER-MOBILE-ELEVATION-USAGETYPE", "IP-COUNTRY-REGION-CITY-LATITUDE-LONGITUDE-ISP-DOMAIN-MOBILE-USAGETYPE", "IP-COUNTRY-REGION-CITY-LATITUDE-LONGITUDE-ZIPCODE-TIMEZONE-ISP-DOMAIN-NETSPEED-AREACODE-WEATHER-MOBILE-ELEVATION", "IP-COUNTRY-REGION-CITY-LATITUDE-LONGITUDE-ZIPCODE-TIMEZONE-AREACODE-ELEVATION", "IP-COUNTRY-REGION-CITY-LATITUDE-LONGITUDE-ZIPCODE-TIMEZONE-ISP-DOMAIN-NETSPEED-AREACODE-WEATHER-MOBILE", "IP-COUNTRY-REGION-CITY-LATITUDE-LONGITUDE-ISP-DOMAIN-MOBILE", "IP-COUNTRY-REGION-CITY-LATITUDE-LONGITUDE-ZIPCODE-TIMEZONE-ISP-DOMAIN-NETSPEED-AREACODE-WEATHER", "IP-COUNTRY-REGION-CITY-LATITUDE-LONGITUDE-ZIPCODE-TIMEZONE-NETSPEED-WEATHER", "IP-COUNTRY-REGION-CITY-LATITUDE-LONGITUDE-ZIPCODE-TIMEZONE-ISP-DOMAIN-NETSPEED-AREACODE", "IP-COUNTRY-REGION-CITY-LATITUDE-LONGITUDE-ZIPCODE-TIMEZONE-AREACODE", "IP-COUNTRY-REGION-CITY-LATITUDE-LONGITUDE-ZIPCODE-TIMEZONE-ISP-DOMAIN-NETSPEED", "IP-COUNTRY-REGION-CITY-LATITUDE-LONGITUDE-TIMEZONE-NETSPEED", "IP-COUNTRY-REGION-CITY-LATITUDE-LONGITUDE-ZIPCODE-TIMEZONE-ISP-DOMAIN", "IP-COUNTRY-REGION-CITY-LATITUDE-LONGITUDE-ZIPCODE-TIMEZONE", "IP-COUNTRY-REGION-CITY-LATITUDE-LONGITUDE-ZIPCODE-ISP-DOMAIN", "IP-COUNTRY-REGION-CITY-LATITUDE-LONGITUDE-ZIPCODE", "IP-COUNTRY-REGION-CITY-LATITUDE-LONGITUDE-ISP-DOMAIN", "IP-COUNTRY-REGION-CITY-ISP-DOMAIN", "IP-COUNTRY-REGION-CITY-LATITUDE-LONGITUDE-ISP", "IP-COUNTRY-REGION-CITY-LATITUDE-LONGITUDE", "IP-COUNTRY-REGION-CITY-ISP", "IP-COUNTRY-REGION-CITY", "IP-COUNTRY-ISP", "IP-COUNTRY", "IPV6-COUNTRY-REGION-CITY-LATITUDE-LONGITUDE-ZIPCODE-TIMEZONE-ISP-DOMAIN-NETSPEED-AREACODE-WEATHER-MOBILE-ELEVATION-USAGETYPE", "IPV6-COUNTRY-REGION-CITY-LATITUDE-LONGITUDE-ISP-DOMAIN-MOBILE-USAGETYPE", "IPV6-COUNTRY-REGION-CITY-LATITUDE-LONGITUDE-ZIPCODE-TIMEZONE-ISP-DOMAIN-NETSPEED-AREACODE-WEATHER-MOBILE-ELEVATION", "IPV6-COUNTRY-REGION-CITY-LATITUDE-LONGITUDE-ZIPCODE-TIMEZONE-AREACODE-ELEVATION", "IPV6-COUNTRY-REGION-CITY-LATITUDE-LONGITUDE-ZIPCODE-TIMEZONE-ISP-DOMAIN-NETSPEED-AREACODE-WEATHER-MOBILE", "IPV6-COUNTRY-REGION-CITY-LATITUDE-LONGITUDE-ISP-DOMAIN-MOBILE", "IPV6-COUNTRY-REGION-CITY-LATITUDE-LONGITUDE-ZIPCODE-TIMEZONE-ISP-DOMAIN-NETSPEED-AREACODE-WEATHER", "IPV6-COUNTRY-REGION-CITY-LATITUDE-LONGITUDE-ZIPCODE-TIMEZONE-NETSPEED-WEATHER", "IPV6-COUNTRY-REGION-CITY-LATITUDE-LONGITUDE-ZIPCODE-TIMEZONE-ISP-DOMAIN-NETSPEED-AREACODE", "IPV6-COUNTRY-REGION-CITY-LATITUDE-LONGITUDE-ZIPCODE-TIMEZONE-AREACODE", "IPV6-COUNTRY-REGION-CITY-LATITUDE-LONGITUDE-ZIPCODE-TIMEZONE-ISP-DOMAIN-NETSPEED", "IPV6-COUNTRY-REGION-CITY-LATITUDE-LONGITUDE-TIMEZONE-NETSPEED", "IPV6-COUNTRY-REGION-CITY-LATITUDE-LONGITUDE-ZIPCODE-TIMEZONE-ISP-DOMAIN", "IPV6-COUNTRY-REGION-CITY-LATITUDE-LONGITUDE-ZIPCODE-TIMEZONE", "IPV6-COUNTRY-REGION-CITY-LATITUDE-LONGITUDE-ZIPCODE-ISP-DOMAIN", "IPV6-COUNTRY-REGION-CITY-LATITUDE-LONGITUDE-ZIPCODE", "IPV6-COUNTRY-REGION-CITY-LATITUDE-LONGITUDE-ISP-DOMAIN", "IPV6-COUNTRY-REGION-CITY-ISP-DOMAIN", "IPV6-COUNTRY-REGION-CITY-LATITUDE-LONGITUDE-ISP", "IPV6-COUNTRY-REGION-CITY-LATITUDE-LONGITUDE", "IPV6-COUNTRY-REGION-CITY-ISP", "IPV6-COUNTRY-REGION-CITY", "IPV6-COUNTRY-ISP", "IPV6-COUNTRY");
    /**
     * Static memory buffer to use for MEMORY_CACHE mode, the keys will be BIN filenames and the values their contents
     *
     * @access private
     * @static
     * @var array
     */
    private static $buffer = array();
    /**
     * The machine's float size
     *
     * @access private
     * @static
     * @var int
     */
    private static $floatSize = NULL;
    /**
     * The configured memory limit
     *
     * @access private
     * @static
     * @var int
     */
    private static $memoryLimit = NULL;
    /**
     * Caching mode to use (one of FILE_IO, MEMORY_CACHE, or SHARED_MEMORY)
     *
     * @access private
     * @var int
     */
    private $mode = NULL;
    /**
     * File pointer to use for FILE_IO mode, BIN filename for MEMORY_CACHE mode, or shared memory id to use for SHARED_MEMORY mode
     *
     * @access private
     * @var resource|int|false
     */
    private $resource = false;
    /**
     * Database's compilation date
     *
     * @access private
     * @var int
     */
    private $date = NULL;
    /**
     * Database's type (0--23)
     *
     * @access private
     * @var int
     */
    private $type = NULL;
    /**
     * Database's register width (as an array mapping 4 to IPv4 width, and 6 to IPv6 width)
     *
     * @access private
     * @var array
     */
    private $columnWidth = array();
    /**
     * Database's pointer offset (as an array mapping 4 to IPv4 offset, and 6 to IPv6 offset)
     *
     * @access private
     * @var array
     */
    private $offset = array();
    /**
     * Amount of IP address ranges the database contains (as an array mapping 4 to IPv4 count, and 6 to IPv6 count)
     *
     * @access private
     * @var array
     */
    private $ipCount = array();
    /**
     * Offset withing the database where IP data begins (as an array mapping 4 to IPv4 base, and 6 to IPv6 base)
     *
     * @access private
     * @var array
     */
    private $ipBase = array();
    private $indexBaseAddr = array();
    private $year = NULL;
    private $month = NULL;
    private $day = NULL;
    /**
     * Default fields to return during lookup
     *
     * @access private
     * @var int|array
     */
    private $defaultFields = self::ALL;
    const VERSION = "8.0.2";
    const FIELD_NOT_SUPPORTED = "This parameter is unavailable in selected .BIN data file. Please upgrade.";
    const FIELD_NOT_KNOWN = "This parameter is inexistent. Please verify.";
    const INVALID_IP_ADDRESS = "Invalid IP address.";
    const COUNTRY_CODE = 1;
    const COUNTRY_NAME = 2;
    const REGION_NAME = 3;
    const CITY_NAME = 4;
    const LATITUDE = 5;
    const LONGITUDE = 6;
    const ISP = 7;
    const DOMAIN_NAME = 8;
    const ZIP_CODE = 9;
    const TIME_ZONE = 10;
    const NET_SPEED = 11;
    const IDD_CODE = 12;
    const AREA_CODE = 13;
    const WEATHER_STATION_CODE = 14;
    const WEATHER_STATION_NAME = 15;
    const MCC = 16;
    const MNC = 17;
    const MOBILE_CARRIER_NAME = 18;
    const ELEVATION = 19;
    const USAGE_TYPE = 20;
    const COUNTRY = 101;
    const COORDINATES = 102;
    const IDD_AREA = 103;
    const WEATHER_STATION = 104;
    const MCC_MNC_MOBILE_CARRIER_NAME = 105;
    const ALL = 1001;
    const IP_ADDRESS = 1002;
    const IP_VERSION = 1003;
    const IP_NUMBER = 1004;
    const EXCEPTION = 10000;
    const EXCEPTION_NO_SHMOP = 10001;
    const EXCEPTION_SHMOP_READING_FAILED = 10002;
    const EXCEPTION_SHMOP_WRITING_FAILED = 10003;
    const EXCEPTION_SHMOP_CREATE_FAILED = 10004;
    const EXCEPTION_DBFILE_NOT_FOUND = 10005;
    const EXCEPTION_NO_MEMORY = 10006;
    const EXCEPTION_NO_CANDIDATES = 10007;
    const EXCEPTION_FILE_OPEN_FAILED = 10008;
    const EXCEPTION_NO_PATH = 10009;
    const FILE_IO = 100001;
    const MEMORY_CACHE = 100002;
    const SHARED_MEMORY = 100003;
    const SHM_PERMS = 384;
    const SHM_CHUNK_SIZE = 524288;
    /**
     * Constructor
     *
     * @access public
     * @param string $file  Filename of the BIN database to load
     * @param int $mode  Caching mode (one of FILE_IO, MEMORY_CACHE, or SHARED_MEMORY)
     * @throws \Exception
     */
    public function __construct($file = NULL, $mode = self::FILE_IO, $defaultFields = self::ALL)
    {
        $rfile = self::findFile($file);
        $size = filesize($rfile);
        switch ($mode) {
            case self::SHARED_MEMORY:
                if (!extension_loaded("shmop")) {
                    throw new \Exception("IP2Location\\Database" . ": Please make sure your PHP setup has the 'shmop' extension enabled.", self::EXCEPTION_NO_SHMOP);
                }
                $limit = self::getMemoryLimit();
                if (false !== $limit && $limit < $size) {
                    throw new \Exception("IP2Location\\Database" . ": Insufficient memory to load file '" . $rfile . "'.", self::EXCEPTION_NO_MEMORY);
                }
                $this->mode = self::SHARED_MEMORY;
                $shmKey = self::getShmKey($rfile);
                $this->resource = @shmop_open($shmKey, "a", 0, 0);
                if (false === $this->resource) {
                    $fp = fopen($rfile, "rb");
                    if (false === $fp) {
                        throw new \Exception("IP2Location\\Database" . ": Unable to open file '" . $rfile . "'.", self::EXCEPTION_FILE_OPEN_FAILED);
                    }
                    $shmId = @shmop_open($shmKey, "n", self::SHM_PERMS, $size);
                    if (false === $shmId) {
                        throw new \Exception("IP2Location\\Database" . ": Unable to create shared memory block '" . $shmKey . "'.", self::EXCEPTION_SHMOP_CREATE_FAILED);
                    }
                    $pointer = 0;
                    while ($pointer < $size) {
                        $buf = fread($fp, self::SHM_CHUNK_SIZE);
                        shmop_write($shmId, $buf, $pointer);
                        $pointer += self::SHM_CHUNK_SIZE;
                    }
                    shmop_close($shmId);
                    fclose($fp);
                    $this->resource = @shmop_open($shmKey, "a", 0, 0);
                    if (false === $this->resource) {
                        throw new \Exception("IP2Location\\Database" . ": Unable to access shared memory block '" . $shmKey . "' for reading.", self::EXCEPTION_SHMOP_READING_FAILED);
                    }
                }
                break;
            case self::FILE_IO:
                $this->mode = self::FILE_IO;
                $this->resource = @fopen($rfile, "rb");
                if (false === $this->resource) {
                    throw new \Exception("IP2Location\\Database" . ": Unable to open file '" . $rfile . "'.", self::EXCEPTION_FILE_OPEN_FAILED);
                }
                break;
            case self::MEMORY_CACHE:
                $this->mode = self::MEMORY_CACHE;
                $this->resource = $rfile;
                if (!array_key_exists($rfile, self::$buffer)) {
                    $limit = self::getMemoryLimit();
                    if (false !== $limit && $limit < $size) {
                        throw new \Exception("IP2Location\\Database" . ": Insufficient memory to load file '" . $rfile . "'.", self::EXCEPTION_NO_MEMORY);
                    }
                    self::$buffer[$rfile] = @file_get_contents($rfile);
                    if (false === self::$buffer[$rfile]) {
                        throw new \Exception("IP2Location\\Database" . ": Unable to open file '" . $rfile . "'.", self::EXCEPTION_FILE_OPEN_FAILED);
                    }
                }
                break;
        }
        if (null === self::$floatSize) {
            self::$floatSize = strlen(pack("f", M_PI));
        }
        $this->defaultFields = $defaultFields;
        $this->type = $this->readByte(1) - 1;
        $this->columnWidth[4] = $this->readByte(2) * 4;
        $this->columnWidth[6] = $this->columnWidth[4] + 12;
        $this->offset[4] = -4;
        $this->offset[6] = 8;
        $this->year = 2000 + $this->readByte(3);
        $this->month = $this->readByte(4);
        $this->day = $this->readByte(5);
        $this->date = date("Y-m-d", strtotime((string) $this->year . "-" . $this->month . "-" . $this->day));
        $this->ipCount[4] = $this->readWord(6);
        $this->ipBase[4] = $this->readWord(10);
        $this->ipCount[6] = $this->readWord(14);
        $this->ipBase[6] = $this->readWord(18);
        $this->indexBaseAddr[4] = $this->readWord(22);
        $this->indexBaseAddr[6] = $this->readWord(26);
    }
    /**
     * Destructor
     *
     * @access public
     */
    public function __destruct()
    {
        switch ($this->mode) {
            case self::FILE_IO:
                if (false !== $this->resource) {
                    fclose($this->resource);
                    $this->resource = false;
                }
                break;
            case self::SHARED_MEMORY:
                if (false !== $this->resource) {
                    shmop_close($this->resource);
                    $this->resource = false;
                }
                break;
        }
    }
    /**
     * Tear down a shared memory segment created for the given file
     *
     * @access public
     * @static
     * @param string $file  Filename of the BIN database whise segment must be deleted
     * @throws \Exception
     */
    public static function shmTeardown($file)
    {
        if (!extension_loaded("shmop")) {
            throw new \Exception("IP2Location\\Database" . ": Please make sure your PHP setup has the 'shmop' extension enabled.", self::EXCEPTION_NO_SHMOP);
        }
        $rfile = realpath($file);
        if (false === $rfile) {
            throw new \Exception("IP2Location\\Database" . ": Database file '" . $file . "' does not seem to exist.", self::EXCEPTION_DBFILE_NOT_FOUND);
        }
        $shmKey = self::getShmKey($rfile);
        $shmId = @shmop_open($shmKey, "w", 0, 0);
        if (false === $shmId) {
            throw new \Exception("IP2Location\\Database" . ": Unable to access shared memory block '" . $shmKey . "' for writing.", self::EXCEPTION_SHMOP_WRITING_FAILED);
        }
        shmop_delete($shmId);
        shmop_close($shmId);
    }
    /**
     * Get memory limit from the current PHP settings (return false if no memory limit set)
     *
     * @access private
     * @static
     * @return int|boolean
     */
    private static function getMemoryLimit()
    {
        if (null === self::$memoryLimit) {
            $limit = ini_get("memory_limit");
            if ("" === (string) $limit) {
                $limit = "128M";
            }
            $value = (int) $limit;
            if ($value < 0) {
                $value = false;
            } else {
                switch (strtoupper(substr($limit, -1))) {
                    case "G":
                        $value *= 1024;
                    case "M":
                        $value *= 1024;
                    case "K":
                        $value *= 1024;
                }
            }
            self::$memoryLimit = $value;
        }
        return self::$memoryLimit;
    }
    /**
     * Return the realpath of the given file or look for the first matching database option
     *
     * @param string $file  File to try to find, or null to try the databases in turn on the current file's path
     * @return string
     * @throws \Exception
     */
    private static function findFile($file = NULL)
    {
        if (null !== $file) {
            $rfile = realpath($file);
            if (false === $rfile) {
                throw new \Exception("IP2Location\\Database" . ": Database file '" . $file . "' does not seem to exist.", self::EXCEPTION_DBFILE_NOT_FOUND);
            }
            return $rfile;
        }
        $current = realpath(dirname(__FILE__));
        if (false === $current) {
            throw new \Exception("IP2Location\\Database" . ": Cannot determine current path.", self::EXCEPTION_NO_PATH);
        }
        foreach (self::$databases as $database) {
            $rfile = realpath((string) $current . "/" . $database . ".BIN");
            if (false !== $rfile) {
                return $rfile;
            }
        }
        throw new \Exception("IP2Location\\Database" . ": No candidate database files found.", self::EXCEPTION_NO_CANDIDATES);
    }
    /**
     * Make the given number positive by wrapping it to 8 bit values
     *
     * @access private
     * @static
     * @param int $x  Number to wrap
     * @return int
     */
    private static function wrap8($x)
    {
        return $x + ($x < 0 ? 256 : 0);
    }
    /**
     * Make the given number positive by wrapping it to 32 bit values
     *
     * @access private
     * @static
     * @param int $x  Number to wrap
     * @return int
     */
    private static function wrap32($x)
    {
        return $x + ($x < 0 ? 4294967296.0 : 0);
    }
    /**
     * Generate a unique and repeatable shared memory key for each instance to use
     *
     * @access private
     * @static
     * @param string $filename  Filename of the BIN file
     * @return int
     */
    private static function getShmKey($filename)
    {
        return (int) sprintf("%u", self::wrap32(crc32(__FILE__ . ":" . $filename)));
    }
    /**
     * Determine whether the given IP number of the given version lies between the given bounds
     *
     * This function will return 0 if the given ip number falls within the given bounds
     * for the given version, -1 if it falls below, and 1 if it falls above.
     *
     * @access private
     * @static
     * @param int $version  IP version to use (either 4 or 6)
     * @param int|string $ip  IP number to check (int for IPv4, string for IPv6)
     * @param int|string $low  Lower bound (int for IPv4, string for IPv6)
     * @param int|string $high  Uppoer bound (int for IPv4, string for IPv6)
     * @return int
     */
    private static function ipBetween($version, $ip, $low, $high)
    {
        if (4 === $version) {
            if ($low <= $ip) {
                if ($ip < $high) {
                    return 0;
                }
                return 1;
            }
            return -1;
        }
        if (bccomp($low, $ip, 0) <= 0) {
            if (bccomp($ip, $high, 0) <= -1) {
                return 0;
            }
            return 1;
        }
        return -1;
    }
    /**
     * Get the IP version and number of the given IP address
     *
     * This method will return an array, whose components will be:
     * - first: 4 if the given IP address is an IPv4 one, 6 if it's an IPv6 one,
     *          or fase if it's neither.
     * - second: the IP address' number if its version is 4, the number string if
     *           its version is 6, false otherwise.
     *
     * @access private
     * @static
     * @param string $ip  IP address to extract the version and number for
     * @return array
     */
    private static function ipVersionAndNumber($ip)
    {
        if (filter_var($ip, FILTER_VALIDATE_IP, FILTER_FLAG_IPV4)) {
            return array(4, sprintf("%u", ip2long($ip)));
        }
        if (filter_var($ip, FILTER_VALIDATE_IP, FILTER_FLAG_IPV6)) {
            $result = 0;
            foreach (str_split(bin2hex(inet_pton($ip)), 8) as $word) {
                $result = bcadd(bcmul($result, "4294967296", 0), self::wrap32(hexdec($word)), 0);
            }
            return array(6, $result);
        } else {
            return array(false, false);
        }
    }
    /**
     * Return the decimal string representing the binary data given
     *
     * @access private
     * @static
     * @param string $data  Binary data to parse
     * @return string
     */
    private static function bcBin2Dec($data)
    {
        $parts = array(unpack("V", substr($data, 12, 4)), unpack("V", substr($data, 8, 4)), unpack("V", substr($data, 4, 4)), unpack("V", substr($data, 0, 4)));
        foreach ($parts as &$part) {
            if ($part[1] < 0) {
                $part[1] += 4294967296.0;
            }
        }
        $result = bcadd(bcadd(bcmul($parts[0][1], bcpow(4294967296.0, 3)), bcmul($parts[1][1], bcpow(4294967296.0, 2))), bcadd(bcmul($parts[2][1], 4294967296.0), $parts[3][1]));
        return $result;
    }
    /**
     * Low level read function to abstract away the caching mode being used
     *
     * @access private
     * @param int $pos  Position from where to start reading
     * @param int $len  Read this many bytes
     * @return string
     */
    private function read($pos, $len)
    {
        switch ($this->mode) {
            case self::SHARED_MEMORY:
                return shmop_read($this->resource, $pos, $len);
            case self::MEMORY_CACHE:
                return $data = substr(self::$buffer[$this->resource], $pos, $len);
            default:
                fseek($this->resource, $pos, SEEK_SET);
        }
        return fread($this->resource, $len);
    }
    /**
     * Low level function to fetch a string from the caching backend
     *
     * @access private
     * @param int $pos  Position to read from
     * @param int $additional  Additional offset to apply
     * @return string
     */
    private function readString($pos, $additional = 0)
    {
        $spos = $this->readWord($pos) + $additional;
        return $this->read($spos + 1, $this->readByte($spos + 1));
    }
    /**
     * Low level function to fetch a float from the caching backend
     *
     * @access private
     * @param int $pos  Position to read from
     * @return float
     */
    private function readFloat($pos)
    {
        return unpack("f", $this->read($pos - 1, self::$floatSize))[1];
    }
    /**
     * Low level function to fetch a quadword (128 bits) from the caching backend
     *
     * @access private
     * @param int $pos  Position to read from
     * @return string
     */
    private function readQuad($pos)
    {
        return self::bcBin2Dec($this->read($pos - 1, 16));
    }
    /**
     * Low level function to fetch a word (32 bits) from the caching backend
     *
     * @access private
     * @param int $pos  Position to read from
     * @return int
     */
    private function readWord($pos)
    {
        return self::wrap32(unpack("V", $this->read($pos - 1, 4))[1]);
    }
    /**
     * Low level function to fetch a byte from the caching backend
     *
     * @access private
     * @param int $pos  Position to read from
     * @return string
     */
    private function readByte($pos)
    {
        return self::wrap8(unpack("C", $this->read($pos - 1, 1))[1]);
    }
    /**
     * High level function to fetch the country name and code
     *
     * @access private
     * @param int|boolean $pointer  Position to read from, if false, return self::INVALID_IP_ADDRESS
     * @return array
     */
    private function readCountryNameAndCode($pointer)
    {
        if (false === $pointer) {
            $countryCode = self::INVALID_IP_ADDRESS;
            $countryName = self::INVALID_IP_ADDRESS;
        } else {
            if (0 === self::$columns[self::COUNTRY_CODE][$this->type]) {
                $countryCode = self::FIELD_NOT_SUPPORTED;
                $countryName = self::FIELD_NOT_SUPPORTED;
            } else {
                $countryCode = $this->readString($pointer + self::$columns[self::COUNTRY_CODE][$this->type]);
                $countryName = $this->readString($pointer + self::$columns[self::COUNTRY_NAME][$this->type], 3);
            }
        }
        return array($countryName, $countryCode);
    }
    /**
     * High level function to fetch the region name
     *
     * @access private
     * @param int $pointer  Position to read from, if false, return self::INVALID_IP_ADDRESS
     * @return string
     */
    private function readRegionName($pointer)
    {
        if (false === $pointer) {
            $regionName = self::INVALID_IP_ADDRESS;
        } else {
            if (0 === self::$columns[self::REGION_NAME][$this->type]) {
                $regionName = self::FIELD_NOT_SUPPORTED;
            } else {
                $regionName = $this->readString($pointer + self::$columns[self::REGION_NAME][$this->type]);
            }
        }
        return $regionName;
    }
    /**
     * High level function to fetch the city name
     *
     * @access private
     * @param int $pointer  Position to read from, if false, return self::INVALID_IP_ADDRESS
     * @return string
     */
    private function readCityName($pointer)
    {
        if (false === $pointer) {
            $cityName = self::INVALID_IP_ADDRESS;
        } else {
            if (0 === self::$columns[self::CITY_NAME][$this->type]) {
                $cityName = self::FIELD_NOT_SUPPORTED;
            } else {
                $cityName = $this->readString($pointer + self::$columns[self::CITY_NAME][$this->type]);
            }
        }
        return $cityName;
    }
    /**
     * High level function to fetch the latitude and longitude
     *
     * @access private
     * @param int $pointer  Position to read from, if false, return self::INVALID_IP_ADDRESS
     * @return array
     */
    private function readLatitudeAndLongitude($pointer)
    {
        if (false === $pointer) {
            $latitude = self::INVALID_IP_ADDRESS;
            $longitude = self::INVALID_IP_ADDRESS;
        } else {
            if (0 === self::$columns[self::LATITUDE][$this->type]) {
                $latitude = self::FIELD_NOT_SUPPORTED;
                $longitude = self::FIELD_NOT_SUPPORTED;
            } else {
                $latitude = $this->readFloat($pointer + self::$columns[self::LATITUDE][$this->type]);
                $longitude = $this->readFloat($pointer + self::$columns[self::LONGITUDE][$this->type]);
            }
        }
        return array($latitude, $longitude);
    }
    /**
     * High level function to fetch the ISP name
     *
     * @access private
     * @param int $pointer  Position to read from, if false, return self::INVALID_IP_ADDRESS
     * @return string
     */
    private function readIsp($pointer)
    {
        if (false === $pointer) {
            $isp = self::INVALID_IP_ADDRESS;
        } else {
            if (0 === self::$columns[self::ISP][$this->type]) {
                $isp = self::FIELD_NOT_SUPPORTED;
            } else {
                $isp = $this->readString($pointer + self::$columns[self::ISP][$this->type]);
            }
        }
        return $isp;
    }
    /**
     * High level function to fetch the domain name
     *
     * @access private
     * @param int $pointer  Position to read from, if false, return self::INVALID_IP_ADDRESS
     * @return string
     */
    private function readDomainName($pointer)
    {
        if (false === $pointer) {
            $domainName = self::INVALID_IP_ADDRESS;
        } else {
            if (0 === self::$columns[self::DOMAIN_NAME][$this->type]) {
                $domainName = self::FIELD_NOT_SUPPORTED;
            } else {
                $domainName = $this->readString($pointer + self::$columns[self::DOMAIN_NAME][$this->type]);
            }
        }
        return $domainName;
    }
    /**
     * High level function to fetch the zip code
     *
     * @access private
     * @param int $pointer  Position to read from, if false, return self::INVALID_IP_ADDRESS
     * @return string
     */
    private function readZipCode($pointer)
    {
        if (false === $pointer) {
            $zipCode = self::INVALID_IP_ADDRESS;
        } else {
            if (0 === self::$columns[self::ZIP_CODE][$this->type]) {
                $zipCode = self::FIELD_NOT_SUPPORTED;
            } else {
                $zipCode = $this->readString($pointer + self::$columns[self::ZIP_CODE][$this->type]);
            }
        }
        return $zipCode;
    }
    /**
     * High level function to fetch the time zone
     *
     * @access private
     * @param int $pointer  Position to read from, if false, return self::INVALID_IP_ADDRESS
     * @return string
     */
    private function readTimeZone($pointer)
    {
        if (false === $pointer) {
            $timeZone = self::INVALID_IP_ADDRESS;
        } else {
            if (0 === self::$columns[self::TIME_ZONE][$this->type]) {
                $timeZone = self::FIELD_NOT_SUPPORTED;
            } else {
                $timeZone = $this->readString($pointer + self::$columns[self::TIME_ZONE][$this->type]);
            }
        }
        return $timeZone;
    }
    /**
     * High level function to fetch the net speed
     *
     * @access private
     * @param int $pointer  Position to read from, if false, return self::INVALID_IP_ADDRESS
     * @return string
     */
    private function readNetSpeed($pointer)
    {
        if (false === $pointer) {
            $netSpeed = self::INVALID_IP_ADDRESS;
        } else {
            if (0 === self::$columns[self::NET_SPEED][$this->type]) {
                $netSpeed = self::FIELD_NOT_SUPPORTED;
            } else {
                $netSpeed = $this->readString($pointer + self::$columns[self::NET_SPEED][$this->type]);
            }
        }
        return $netSpeed;
    }
    /**
     * High level function to fetch the IDD and area codes
     *
     * @access private
     * @param int $pointer  Position to read from, if false, return self::INVALID_IP_ADDRESS
     * @return array
     */
    private function readIddAndAreaCodes($pointer)
    {
        if (false === $pointer) {
            $iddCode = self::INVALID_IP_ADDRESS;
            $areaCode = self::INVALID_IP_ADDRESS;
        } else {
            if (0 === self::$columns[self::IDD_CODE][$this->type]) {
                $iddCode = self::FIELD_NOT_SUPPORTED;
                $areaCode = self::FIELD_NOT_SUPPORTED;
            } else {
                $iddCode = $this->readString($pointer + self::$columns[self::IDD_CODE][$this->type]);
                $areaCode = $this->readString($pointer + self::$columns[self::AREA_CODE][$this->type]);
            }
        }
        return array($iddCode, $areaCode);
    }
    /**
     * High level function to fetch the weather station name and code
     *
     * @access private
     * @param int $pointer  Position to read from, if false, return self::INVALID_IP_ADDRESS
     * @return array
     */
    private function readWeatherStationNameAndCode($pointer)
    {
        if (false === $pointer) {
            $weatherStationName = self::INVALID_IP_ADDRESS;
            $weatherStationCode = self::INVALID_IP_ADDRESS;
        } else {
            if (0 === self::$columns[self::WEATHER_STATION_NAME][$this->type]) {
                $weatherStationName = self::FIELD_NOT_SUPPORTED;
                $weatherStationCode = self::FIELD_NOT_SUPPORTED;
            } else {
                $weatherStationName = $this->readString($pointer + self::$columns[self::WEATHER_STATION_NAME][$this->type]);
                $weatherStationCode = $this->readString($pointer + self::$columns[self::WEATHER_STATION_CODE][$this->type]);
            }
        }
        return array($weatherStationName, $weatherStationCode);
    }
    /**
     * High level function to fetch the MCC, MNC, and mobile carrier name
     *
     * @access private
     * @param int $pointer  Position to read from, if false, return self::INVALID_IP_ADDRESS
     * @return array
     */
    private function readMccMncAndMobileCarrierName($pointer)
    {
        if (false === $pointer) {
            $mcc = self::INVALID_IP_ADDRESS;
            $mnc = self::INVALID_IP_ADDRESS;
            $mobileCarrierName = self::INVALID_IP_ADDRESS;
        } else {
            if (0 === self::$columns[self::MCC][$this->type]) {
                $mcc = self::FIELD_NOT_SUPPORTED;
                $mnc = self::FIELD_NOT_SUPPORTED;
                $mobileCarrierName = self::FIELD_NOT_SUPPORTED;
            } else {
                $mcc = $this->readString($pointer + self::$columns[self::MCC][$this->type]);
                $mnc = $this->readString($pointer + self::$columns[self::MNC][$this->type]);
                $mobileCarrierName = $this->readString($pointer + self::$columns[self::MOBILE_CARRIER_NAME][$this->type]);
            }
        }
        return array($mcc, $mnc, $mobileCarrierName);
    }
    /**
     * High level function to fetch the elevation
     *
     * @access private
     * @param int $pointer  Position to read from, if false, return self::INVALID_IP_ADDRESS
     * @return string
     */
    private function readElevation($pointer)
    {
        if (false === $pointer) {
            $elevation = self::INVALID_IP_ADDRESS;
        } else {
            if (0 === self::$columns[self::ELEVATION][$this->type]) {
                $elevation = self::FIELD_NOT_SUPPORTED;
            } else {
                $elevation = $this->readString($pointer + self::$columns[self::ELEVATION][$this->type]);
            }
        }
        return $elevation;
    }
    /**
     * High level function to fetch the usage type
     *
     * @access private
     * @param int $pointer  Position to read from, if false, return self::INVALID_IP_ADDRESS
     * @return string
     */
    private function readUsageType($pointer)
    {
        if (false === $pointer) {
            $usageType = self::INVALID_IP_ADDRESS;
        } else {
            if (0 === self::$columns[self::USAGE_TYPE][$this->type]) {
                $usageType = self::FIELD_NOT_SUPPORTED;
            } else {
                $usageType = $this->readString($pointer + self::$columns[self::USAGE_TYPE][$this->type]);
            }
        }
        return $usageType;
    }
    /**
     * High level fucntion to read an IP address of the given version
     *
     * @access private
     * @param int $version  IP version to read (either 4 or 6, returns false on anything else)
     * @param int $pos  Position to read from
     * @return int|string|boolean
     */
    private function readIp($version, $pos)
    {
        if (4 === $version) {
            return self::wrap32($this->readWord($pos));
        }
        if (6 === $version) {
            return $this->readQuad($pos);
        }
        return false;
    }
    /**
     * Perform a binary search on the given IP number and return a pointer to its record
     *
     * @access private
     * @param int $version  IP version to use for searching
     * @param int $ipNumber  IP number to look for
     * @return int|boolean
     */
    private function binSearch($version, $ipNumber)
    {
        if (false === $version) {
            return false;
        }
        $base = $this->ipBase[$version];
        $offset = $this->offset[$version];
        $width = $this->columnWidth[$version];
        $high = $this->ipCount[$version];
        $low = 0;
        $indexBaseStart = $this->indexBaseAddr[$version];
        if (0 < $indexBaseStart) {
            $indexPos = 0;
            switch ($version) {
                case 4:
                    $ipNum1_2 = intval($ipNumber / 65536);
                    $indexPos = $indexBaseStart + ($ipNum1_2 << 3);
                    break;
                case 6:
                    $ipNum1 = intval(bcdiv($ipNumber, bcpow("2", "112")));
                    $indexPos = $indexBaseStart + ($ipNum1 << 3);
                    break;
                default:
                    return false;
            }
            $low = $this->readWord($indexPos);
            $high = $this->readWord($indexPos + 4);
        }
        while ($low <= $high) {
            $mid = (int) ($low + ($high - $low >> 1));
            $ip_from = $this->readIp($version, $base + $width * $mid);
            $ip_to = $this->readIp($version, $base + $width * ($mid + 1));
            switch (self::ipBetween($version, $ipNumber, $ip_from, $ip_to)) {
                case 0:
                    return $base + $offset + $mid * $width;
                case -1:
                    $high = $mid - 1;
                    break;
                case 1:
                    $low = $mid + 1;
                    break;
            }
        }
        return false;
    }
    /**
     * Get the database's compilation date as a string of the form 'YYYY-MM-DD'
     *
     * @access public
     * @return string
     */
    public function getDate()
    {
        return $this->date;
    }
    /**
     * Get the database's type (1--24)
     *
     * @access public
     * @return int
     */
    public function getType()
    {
        return $this->type + 1;
    }
    /**
     * Return this database's available fields
     *
     * @access public
     * @param boolean $asNames  Whether to return the mapped names intead of numbered constants
     * @return array
     */
    public function getFields($asNames = false)
    {
        $result = array_keys(array_filter(self::$columns, function ($field) {
            return 0 !== $field[$this->type];
        }));
        if ($asNames) {
            $return = array();
            foreach ($result as $field) {
                $return[] = self::$names[$field];
            }
            return $return;
        } else {
            return $result;
        }
    }
    /**
     * Return the version of module
     */
    public function getModuleVersion()
    {
        return self::VERSION;
    }
    /**
     * Return the version of module
     */
    public function getDatabaseVersion()
    {
        return $this->year . "." . $this->month . "." . $this->day;
    }
    /**
     * This function will look the given IP address up in the database and return the result(s) asked for
     *
     * If a single, SINGULAR, field is specified, only its mapped value is returned.
     * If many fields are given (as an array) or a MULTIPLE field is specified, an
     * array whith the returned singular field names as keys and their corresponding
     * values is returned.
     *
     * @access public
     * @param string $ip  IP address to look up
     * @param int|array $fields  Field(s) to return
     * @param boolean $asNamed  Whether to return an associative array instead
     * @return mixed|array|boolean
     */
    public function lookup($ip, $fields = NULL, $asNamed = true)
    {
        list($ipVersion, $ipNumber) = self::ipVersionAndNumber($ip);
        $pointer = $this->binSearch($ipVersion, $ipNumber);
        if (null === $fields) {
            $fields = $this->defaultFields;
        }
        $ifields = (array) $fields;
        if (in_array(self::ALL, $ifields)) {
            $ifields[] = self::REGION_NAME;
            $ifields[] = self::CITY_NAME;
            $ifields[] = self::ISP;
            $ifields[] = self::DOMAIN_NAME;
            $ifields[] = self::ZIP_CODE;
            $ifields[] = self::TIME_ZONE;
            $ifields[] = self::NET_SPEED;
            $ifields[] = self::ELEVATION;
            $ifields[] = self::USAGE_TYPE;
            $ifields[] = self::COUNTRY;
            $ifields[] = self::COORDINATES;
            $ifields[] = self::IDD_AREA;
            $ifields[] = self::WEATHER_STATION;
            $ifields[] = self::MCC_MNC_MOBILE_CARRIER_NAME;
            $ifields[] = self::IP_ADDRESS;
            $ifields[] = self::IP_VERSION;
            $ifields[] = self::IP_NUMBER;
        }
        $afields = array_keys(array_flip($ifields));
        rsort($afields);
        $done = array(self::COUNTRY_CODE => false, self::COUNTRY_NAME => false, self::REGION_NAME => false, self::CITY_NAME => false, self::LATITUDE => false, self::LONGITUDE => false, self::ISP => false, self::DOMAIN_NAME => false, self::ZIP_CODE => false, self::TIME_ZONE => false, self::NET_SPEED => false, self::IDD_CODE => false, self::AREA_CODE => false, self::WEATHER_STATION_CODE => false, self::WEATHER_STATION_NAME => false, self::MCC => false, self::MNC => false, self::MOBILE_CARRIER_NAME => false, self::ELEVATION => false, self::USAGE_TYPE => false, self::COUNTRY => false, self::COORDINATES => false, self::IDD_AREA => false, self::WEATHER_STATION => false, self::MCC_MNC_MOBILE_CARRIER_NAME => false, self::IP_ADDRESS => false, self::IP_VERSION => false, self::IP_NUMBER => false);
        $results = array();
        foreach ($afields as $afield) {
            switch ($afield) {
                case self::ALL:
                    break;
                case self::COUNTRY:
                    if (!$done[self::COUNTRY]) {
                        list($results[self::COUNTRY_NAME], $results[self::COUNTRY_CODE]) = $this->readCountryNameAndCode($pointer);
                        $done[self::COUNTRY] = true;
                        $done[self::COUNTRY_CODE] = true;
                        $done[self::COUNTRY_NAME] = true;
                    }
                    break;
                case self::COORDINATES:
                    if (!$done[self::COORDINATES]) {
                        list($results[self::LATITUDE], $results[self::LONGITUDE]) = $this->readLatitudeAndLongitude($pointer);
                        $done[self::COORDINATES] = true;
                        $done[self::LATITUDE] = true;
                        $done[self::LONGITUDE] = true;
                    }
                    break;
                case self::IDD_AREA:
                    if (!$done[self::IDD_AREA]) {
                        list($results[self::IDD_CODE], $results[self::AREA_CODE]) = $this->readIddAndAreaCodes($pointer);
                        $done[self::IDD_AREA] = true;
                        $done[self::IDD_CODE] = true;
                        $done[self::AREA_CODE] = true;
                    }
                    break;
                case self::WEATHER_STATION:
                    if (!$done[self::WEATHER_STATION]) {
                        list($results[self::WEATHER_STATION_NAME], $results[self::WEATHER_STATION_CODE]) = $this->readWeatherStationNameAndCode($pointer);
                        $done[self::WEATHER_STATION] = true;
                        $done[self::WEATHER_STATION_NAME] = true;
                        $done[self::WEATHER_STATION_CODE] = true;
                    }
                    break;
                case self::MCC_MNC_MOBILE_CARRIER_NAME:
                    if (!$done[self::MCC_MNC_MOBILE_CARRIER_NAME]) {
                        list($results[self::MCC], $results[self::MNC], $results[self::MOBILE_CARRIER_NAME]) = $this->readMccMncAndMobileCarrierName($pointer);
                        $done[self::MCC_MNC_MOBILE_CARRIER_NAME] = true;
                        $done[self::MCC] = true;
                        $done[self::MNC] = true;
                        $done[self::MOBILE_CARRIER_NAME] = true;
                    }
                    break;
                case self::COUNTRY_CODE:
                    if (!$done[self::COUNTRY_CODE]) {
                        list(, $results[self::COUNTRY_CODE]) = $this->readCountryNameAndCode($pointer);
                        $done[self::COUNTRY_CODE] = true;
                    }
                    break;
                case self::COUNTRY_NAME:
                    if (!$done[self::COUNTRY_NAME]) {
                        list($results[self::COUNTRY_NAME]) = $this->readCountryNameAndCode($pointer);
                        $done[self::COUNTRY_NAME] = true;
                    }
                    break;
                case self::REGION_NAME:
                    if (!$done[self::REGION_NAME]) {
                        $results[self::REGION_NAME] = $this->readRegionName($pointer);
                        $done[self::REGION_NAME] = true;
                    }
                    break;
                case self::CITY_NAME:
                    if (!$done[self::CITY_NAME]) {
                        $results[self::CITY_NAME] = $this->readCityName($pointer);
                        $done[self::CITY_NAME] = true;
                    }
                    break;
                case self::LATITUDE:
                    if (!$done[self::LATITUDE]) {
                        list($results[self::LATITUDE]) = $this->readLatitudeAndLongitude($pointer);
                        $done[self::LATITUDE] = true;
                    }
                    break;
                case self::LONGITUDE:
                    if (!$done[self::LONGITUDE]) {
                        list(, $results[self::LONGITUDE]) = $this->readLatitudeAndLongitude($pointer);
                        $done[self::LONGITUDE] = true;
                    }
                    break;
                case self::ISP:
                    if (!$done[self::ISP]) {
                        $results[self::ISP] = $this->readIsp($pointer);
                        $done[self::ISP] = true;
                    }
                    break;
                case self::DOMAIN_NAME:
                    if (!$done[self::DOMAIN_NAME]) {
                        $results[self::DOMAIN_NAME] = $this->readDomainName($pointer);
                        $done[self::DOMAIN_NAME] = true;
                    }
                    break;
                case self::ZIP_CODE:
                    if (!$done[self::ZIP_CODE]) {
                        $results[self::ZIP_CODE] = $this->readZipCode($pointer);
                        $done[self::ZIP_CODE] = true;
                    }
                    break;
                case self::TIME_ZONE:
                    if (!$done[self::TIME_ZONE]) {
                        $results[self::TIME_ZONE] = $this->readTimeZone($pointer);
                        $done[self::TIME_ZONE] = true;
                    }
                    break;
                case self::NET_SPEED:
                    if (!$done[self::NET_SPEED]) {
                        $results[self::NET_SPEED] = $this->readNetSpeed($pointer);
                        $done[self::NET_SPEED] = true;
                    }
                    break;
                case self::IDD_CODE:
                    if (!$done[self::IDD_CODE]) {
                        list($results[self::IDD_CODE]) = $this->readIddAndAreaCodes($pointer);
                        $done[self::IDD_CODE] = true;
                    }
                    break;
                case self::AREA_CODE:
                    if (!$done[self::AREA_CODE]) {
                        list(, $results[self::AREA_CODE]) = $this->readIddAndAreaCodes($pointer);
                        $done[self::AREA_CODE] = true;
                    }
                    break;
                case self::WEATHER_STATION_CODE:
                    if (!$done[self::WEATHER_STATION_CODE]) {
                        list(, $results[self::WEATHER_STATION_CODE]) = $this->readWeatherStationNameAndCode($pointer);
                        $done[self::WEATHER_STATION_CODE] = true;
                    }
                    break;
                case self::WEATHER_STATION_NAME:
                    if (!$done[self::WEATHER_STATION_NAME]) {
                        list($results[self::WEATHER_STATION_NAME]) = $this->readWeatherStationNameAndCode($pointer);
                        $done[self::WEATHER_STATION_NAME] = true;
                    }
                    break;
                case self::MCC:
                    if (!$done[self::MCC]) {
                        list($results[self::MCC]) = $this->readMccMncAndMobileCarrierName($pointer);
                        $done[self::MCC] = true;
                    }
                    break;
                case self::MNC:
                    if (!$done[self::MNC]) {
                        list(, $results[self::MNC]) = $this->readMccMncAndMobileCarrierName($pointer);
                        $done[self::MNC] = true;
                    }
                    break;
                case self::MOBILE_CARRIER_NAME:
                    if (!$done[self::MOBILE_CARRIER_NAME]) {
                        list(, , $results[self::MOBILE_CARRIER_NAME]) = $this->readMccMncAndMobileCarrierName($pointer);
                        $done[self::MOBILE_CARRIER_NAME] = true;
                    }
                    break;
                case self::ELEVATION:
                    if (!$done[self::ELEVATION]) {
                        $results[self::ELEVATION] = $this->readElevation($pointer);
                        $done[self::ELEVATION] = true;
                    }
                    break;
                case self::USAGE_TYPE:
                    if (!$done[self::USAGE_TYPE]) {
                        $results[self::USAGE_TYPE] = $this->readUsageType($pointer);
                        $done[self::USAGE_TYPE] = true;
                    }
                    break;
                case self::IP_ADDRESS:
                    if (!$done[self::IP_ADDRESS]) {
                        $results[self::IP_ADDRESS] = $ip;
                        $done[self::IP_ADDRESS] = true;
                    }
                    break;
                case self::IP_VERSION:
                    if (!$done[self::IP_VERSION]) {
                        $results[self::IP_VERSION] = $ipVersion;
                        $done[self::IP_VERSION] = true;
                    }
                    break;
                case self::IP_NUMBER:
                    if (!$done[self::IP_NUMBER]) {
                        $results[self::IP_NUMBER] = $ipNumber;
                        $done[self::IP_NUMBER] = true;
                    }
                    break;
                default:
                    $results[$afield] = self::FIELD_NOT_KNOWN;
            }
        }
        if (is_array($fields) || 1 < count($results)) {
            if ($asNamed) {
                $return = array();
                foreach ($results as $key => $val) {
                    if (array_key_exists($key, static::$names)) {
                        $return[static::$names[$key]] = $val;
                    } else {
                        $return[$key] = $val;
                    }
                }
                return $return;
            } else {
                return $results;
            }
        } else {
            return array_values($results)[0];
        }
    }
}

?>