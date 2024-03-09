#!/bin/bash

# Set the URL to send the POST request to
url='http://localhost/Recyco-hub2/public/Automation/CreateCollectingJobs'

# Set the data to send in the request body
data="pwd=123456789"

# Send the POST request with the specified data
response=$(curl -X POST -d "$data" "$url")
echo "$response"