#!/bin/bash

php app/console assetic:dump  && rm -rf app/cache/dev && rm -rf app/cache/prod
