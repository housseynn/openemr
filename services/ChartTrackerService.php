<?php
/**
 * Chart tracker service.
 *
 * Copyright (C) 2017 Victor Kofia <victor.kofia@gmail.com>
 *
 * LICENSE: This program is free software; you can redistribute it and/or
 * modify it under the terms of the GNU General Public License
 * as published by the Free Software Foundation; either version 2
 * of the License, or (at your option) any later version.
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
 * GNU General Public License for more details.
 * You should have received a copy of the GNU General Public License
 * along with this program. If not, see <http://opensource.org/licenses/gpl-license.php>;.
 *
 * @package OpenEMR
 * @author  Victor Kofia <victor.kofia@gmail.com>
 * @link    http://www.open-emr.org
 */

namespace services;

class ChartTrackerService {

    /**
     * Logger used primarily for logging events that are of interest to
     * developers.
     */
    private $logger;

    /**
     * The chart tracker repository to be used for db CRUD operations.
     */
    private $repository;

    /**
     * Default constructor.
     */
    public function __construct() {
        $this->logger = new \common\logging\Logger("\services\ChartTrackerService");
        $database = \common\database\Connector::Instance();
        $entityManager = $database->entityManager;
        $this->repository = $entityManager->getRepository('\entities\ChartTracker');
    }

    /**
     * Add chart tracker table entry.
     *
     * @param array (pid, date, userid, location).
     * @return the pid.
     */
    public function trackPatientLocation($patientLocation) {
        $this->logger->debug('Attempting to track patient location');
        $this->repository->save($patientLocation);
    }

}