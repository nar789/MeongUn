---
title: Alert Dialog
description: Triggers a call to the alert module system
---
<!--
# license: Licensed to the Apache Software Foundation (ASF) under one
#         or more contributor license agreements.  See the NOTICE file
#         distributed with this work for additional information
#         regarding copyright ownership.  The ASF licenses this file
#         to you under the Apache License, Version 2.0 (the
#         "License"); you may not use this file except in compliance
#         with the License.  You may obtain a copy of the License at
#
#           http://www.apache.org/licenses/LICENSE-2.0
#
#         Unless required by applicable law or agreed to in writing,
#         software distributed under the License is distributed on an
#         "AS IS" BASIS, WITHOUT WARRANTIES OR CONDITIONS OF ANY
#         KIND, either express or implied.  See the License for the
#         specific language governing permissions and limitations
#         under the License.
-->


# cordova-plugin-alertdialog

This plugin is very simple. Customize the operating system's native alerts and triggers for an immediate alert to your activity.

## Installation

    cordova plugin add cordova-plugin-alertdialog

### Example

    window.plugins.alertdialog.show('testTitle', 'Success Message!', 'buttonOk');

### Parameters

	1. Title Alert
	2. Message
	3. Label Button

### Supported Platforms

- Android