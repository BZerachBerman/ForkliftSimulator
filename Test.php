<?php
require_once '../LoginLogout/DBAccessInfo.php';

                    echo "DB code executed";

                    $DBAccessor = new DBAccessor();
                    $manufacturers = $DBAccessor->getAllManufacturers();
                    foreach ($manufacturers as $manufacturer) {
                        echo '<br>' . htmlspecialchars($manufacturer).'';
                    }
                    ?>