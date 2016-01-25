<?php

namespace App\Services;

use SDK\KundenMeister;

class KundenMeisterService extends KundenMeister {

    /**
     * KundenMeisterService constructor.
     */
    public function __construct()
    {
        parent::__construct(6, 'q0CTixlOPnB42Yf9gzcOVMPY43W1CizBswiDf8lQNHlsY6ZpklfkcJlHHmOG1n95Anv2zbYcAt8k9hcXOaMK0IqyrhIvOa2GNb1IFZeUREMrTaUEkYvTK53w1Pmc7jBc');
        $this->initialize();
    }
}