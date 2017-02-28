<?php

Route::get('rci_inpspected/{year?}', 'ApiController@RCIInspected');

Route::get('children_inspected/{year?}', 'ApiController@ChildrenInspected');