<?php

namespace Tiger;

/**
 * Class Model (PHP version 7.4)
 *
 * @author      Rudy Mas <rudy.mas@rmsoft.be>
 * @copyright   2022, rmsoft.be. (https://www.rmsoft.be/)
 * @license     https://opensource.org/licenses/GPL-3.0 GNU General Public License, version 3 (GPL-3.0)
 * @version     7.4.0.5
 * @package     Tiger
 */
class Model
{
    private array $init;
    private array $data;

    /**
     * Model constructor.
     * @param array|null $data
     */
    public function __construct(?array $data = null)
    {
        if (!is_null($data)) {
            foreach ($data as $key => $value) {
                $this->data[$key] = $value;
            }
        }
    }

    /**
     * Get the value of data by key
     *
     * @param string $key
     * @return mixed
     */
    public function getData(string $key)
    {
        return $this->data[$key];
    }

    /**
     * Set the value of data by key
     *
     * @param string $key
     * @param mixed $value
     */
    public function setData(string $key, $value): void
    {
        $this->data[$key] = $value;
    }

    /**
     * Update the data with the new provided data
     *
     * @param array $data
     * @return void
     */
    public function updateData(array $data): void
    {
        foreach ($data as $key => $value) {
            $this->data[$key] = $value;
        }
    }

    /**
     * Get all the data
     *
     * @return array
     */
    public function getAll(): array
    {
        return $this->data;
    }

    /**
     * Scrub the data so only the wanted fields are retained
     *
     * @param array $wantedKeys Array of the keys (with initial data) to retain
     * @param array|null $data Array of provided data to clean and merge with the initial data
     * @return array
     */
    public function scrubUnwantedKeys(array $wantedKeys, ?array $data): array
    {
        $scrubbed = [];
        foreach ($wantedKeys as $key => $value) {
            if (isset($data[$key])) {
                $scrubbed[$key] = $data[$key];
            }
        }
        return array_merge($wantedKeys, $scrubbed);
    }
}
