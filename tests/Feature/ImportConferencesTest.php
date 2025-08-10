<?php

use App\Console\Commands\ImportConferences;
use App\Models\Conference;

test('it imports a conference', function () {
    $command = new ImportConferences;

    $data = [
        'name' => 'test',
        '_rel' => ['cfp_uir' => 'v1/cfp/09sfksd0slnlnls0']
    ];

    $command->importOrUpdateConference($data);

    $first = Conference::first();
    $this->assertEquals($first->title, $data['name']);
});
