/*
 *
 * Licensed to the Apache Software Foundation (ASF) under one
 * or more contributor license agreements.  See the NOTICE file
 * distributed with this work for additional information
 * regarding copyright ownership.  The ASF licenses this file
 * to you under the Apache License, Version 2.0 (the
 * "License"); you may not use this file except in compliance
 * with the License.  You may obtain a copy of the License at
 *
 *   http://www.apache.org/licenses/LICENSE-2.0
 *
 * Unless required by applicable law or agreed to in writing,
 * software distributed under the License is distributed on an
 * "AS IS" BASIS, WITHOUT WARRANTIES OR CONDITIONS OF ANY
 * KIND, either express or implied.  See the License for the
 * specific language governing permissions and limitations
 * under the License.
 *
 */

/**
 * This class contains information about the current alert dialog.
 */

function alertdialog() {

}

alertdialog.prototype.show = function(titulo, mensagem, textobotao) {
	var successCallback = null;
	var errorCallback = null;
	var services = "alertdialog";
	var dependentProperties = [];
	dependentProperties.push({
		titulo,
		mensagem,
		textobotao
	});

	var action = "start"; //future actions new entries. Fixed.
	if (mensagem) {
		cordova.exec(successCallback, errorCallback, services, action, dependentProperties);
	}
};

alertdialog.install = function() {
	if (!window.plugins) {
		window.plugins = {};
	}

	window.plugins.alertdialog = new alertdialog();
	return window.plugins.alertdialog;
};

cordova.addConstructor(alertdialog.install);