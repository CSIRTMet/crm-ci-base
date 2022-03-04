/*
 * Funciones Javascript para CIC
 *
 * Copyright (c) 2008 Datasoft Interactions
 * Dual licensed under the MIT (MIT-LICENSE.txt)
 * and GPL (GPL-LICENSE.txt) licenses.
 *
 * $Date: 2008-11-18 12:03:00 -0500 (Tue, 18 Nov 2008) $
 * $Rev: 1 $
 */

/* *********************************************************************************************************** */
	function funcConnect() {
		// elimino antigua variable de conexión
		EICConn = null;
		// Instancio objeto global de conexion de CIC
		EICConn = new ActiveXObject("EICConnection.EICConnection.1");
		
		// Connect to the IC Server
		EICConn.Connect(global_appNameCTI, global_serverCTI, global_userCTI, global_passCTI, global_stationCTI, 1);
		div_logSoftphone.innerText = "Conectado al servidor "+global_serverCTI+" \n"+div_logSoftphone.innerText;
		// inicio observador de la cola del usuario
		funcAddWatcherEICQueue(global_userCTI);
	};
	
	function funcDisconnect() {
		EICConn.Disconnect(false);
		div_logSoftphone.innerText = "Desconectado del Servidor\n"+div_logSoftphone.innerText;
	};
	
	function funcStatusUser() {
		var mEICUser = new ActiveXObject("EICUser.EICUser.1");
		var tmpStatus;
		mEICUser.id = global_userCTI;
		tmpStatus = mEICUser.StatusMessage;
		div_logSoftphone.innerText = "Estado usuario-> "+tmpStatus+" \n"+div_logSoftphone.innerText;
	};
	
	function funcAddWatcherEICQueue(txtUserId) {
		// Antes de iniciliazar estos observadores elimino los elementos de la lista
		$("#listCalls").html('');
		mEICQueue = null;
		// Connect to queue
		var mEICQueue = new ActiveXObject("EICQueue.EICQueue.1");
		mEICQueue.Connect(9, txtUserId); // queue types -> 9 = user queue
		// Set up the Queue2WatcherAdapter
		mEICQueueWatcher = null;
		var mEICQueueWatcher = new ActiveXObject("ClientCOM2.EICQueue2WatcherAdapter.1");
		mEICQueueWatcher.ObjectAddedFunc=QueueObjectAdded;
		mEICQueueWatcher.ObjectChangedFunc=QueueObjectChanged;
		mEICQueueWatcher.ObjectRemovedFunc=QueueObjectRemoved;
		mEICQueueWatcher.StatisticsUpdatedFunc=QueueStatsUpdated;
		mEICQueue.SetMarshalledCallback(mEICQueueWatcher);
		div_logSoftphone.innerText = "Connected to queue "+txtUserId+" \n"+div_logSoftphone.innerText;
		div_logSoftphone.innerText = "Softphone listo.\n"+div_logSoftphone.innerText;
		funcStatusUser();
		
		var mEICQueue2 = new ActiveXObject("EICQueue.EICQueue.1");
		mEICQueue2.Connect(9, txtUserId); // queue types -> 9 = user queue
		
		mEICQueueWatcherCall = null;
		// Set up the Queue2WatcherAdapter
		var mEICQueueWatcherCall = new ActiveXObject("ClientCOM2.EICCallObject2WatcherAdapter.1");
		mEICQueueWatcherCall.ObjectDestroyedFunc=QueueObjectCallDestroyed;
		mEICQueueWatcherCall.ObjectSpecificErrorFunc=QueueObjectCallSpecificError;
		mEICQueueWatcherCall.StateChangedFunc=QueueObjectCallStateChanged;
		mEICQueueWatcherCall.StatusChangeFunc=QueueObjectCallStatusChange;
		mEICQueue2.SetMarshalledCallback(mEICQueueWatcherCall);
		div_logSoftphone.innerText = "Connected to queueCall "+txtUserId+" \n"+div_logSoftphone.innerText;
	};
	
	function QueueObjectCallDestroyed(mEICQueue2) {
		alert("QueueObjectCallDestroyed");
	};
	
	function QueueObjectCallSpecificError(mEICQueue2, descError) {
		alert("QueueObjectCallSpecificError");
	};
	
	function QueueObjectCallStateChanged(mEICQueue2, longNewState, strState) {
		alert("QueueObjectCallStateChanged");
	};
	
	function QueueObjectCallStatusChange(mEICQueue2) {
		alert("QueueObjectCallStatusChange");
	};
	
	// Evento que se ejecuta cuando se agrega un elemento a la cola de llamadas
	function QueueObjectAdded(mEICQueue, queueObj) {
		var tempQueue = new ActiveXObject("EICQueue.EICQueue.1");
		tempQueue = mEICQueue;
		var tempCallObj = new ActiveXObject("EICCallObject.EICCallObject.1");
		tempCallObj = queueObj;
		valueCallId = tempCallObj.GetNamedAttributeS(attrCallId);
		valueRemoteName = tempCallObj.GetNamedAttributeS(attrRemoteName);
		valueRemoteId = tempCallObj.GetNamedAttributeS(attrRemoteId);
		valueCallDirection = tempCallObj.GetNamedAttributeS(attrCallDirection);
		valueWorkgroupName = tempCallObj.GetNamedAttributeS(attrWorkgroupName);
		valueCallState = tempCallObj.GetNamedAttributeS(attrCallState);
		valueConferenceId = tempCallObj.ConferenceId;
		// Actualizo el Select, que despliega las llamadas
		// 1ro -> recorro los elementos option del select, para verificar que el callId no exista previamente
		var strSelect = "";
		var strTmp = "";
		var strTmp2 = "";
		var valueOption = "";
		var existe = false;
		var indiceTmp = 0;
		var selectSeleccionado = false;
		var i = 0;
		var largo = $("#listCalls").find("option").length // Retorno el numero de elementos options del select
		for(i=0;i<largo;i++) {
			strTmp = "#listCalls option:eq("+i+")";
			valueOption = $(strTmp).val();
			// Si existe en el Select el callId agregado
			if(valueOption == valueCallId) {
				//// Comprueba si el elemento option del select existente esta seleccionado
				//indiceTmp = $("#listCalls option").index($("#listCalls option:selected"));
				// si son iguales el option del select esta seleccionado
				//if(indiceTmp == i) {
				//	selectSeleccionado = true;
				//}
				// Reemplazo los valores del elemento actual, por sus nuevos valores
				strTmp = "#listCalls option:eq("+i+")";
				strSelect = funcInicListCall(valueCallId,valueCallState,valueRemoteName,valueRemoteId,valueWorkgroupName,valueCallDirection,valueConferenceId);
				$(strTmp).replaceWith(strSelect);
				// Selecciono el select como seleccionado
				//strTmp2 = "#listCalls option:eq("+i+")";
				//$(strTmp2).attr("selected", "selected");
				existe = true;
			}
		}
		// Si el elemento a agregar no existe en el select
		if(existe == false) {
			// lo agrego como elemento nuevo al select en el 1er lugar
			strSelect = funcInicListCall(valueCallId,valueCallState,valueRemoteName,valueRemoteId,valueWorkgroupName,valueCallDirection,valueConferenceId);
			$("#listCalls").prepend(strSelect);
		}
		// registro evento en el log
		div_logSoftphone.innerText = "Queue Object Added -> "+valueCallId+" \n"+div_logSoftphone.innerText;
		
		/* ******************** En esta sección se ejecutan las acciones cuando ingresa o sale una llamada ****************************** */
		if(valueCallDirection == "I") { /* Llamadas Inbound */
			// Levanta popUp si llamada es Inbound y estado es OFFERING y Llamada pertenece a un grupo ACD, es decir, Workgroup es distinto a vacio
			if(valueCallState == "O" && valueWorkgroupName != '') {
				funcSoftNewCallNotNullWork(tempCallObj); // llama a función que se encuentra definida en archivo index_Softphone.php
			}
			else if(valueCallState == "O" && valueWorkgroupName == '') { // si se agrega una llamada que no pertenece a un Workgroup, solo avisa con alert
				alert("Nueva llamada");
			}
			else {
				; // en caso que se agrega una llamada al listado de llamadas distinta a estado -> O, no hace nada
			}
		}
		else if(valueCallDirection == "O") { /* Llamadas Outbound */
			; // Cuando se agrega al listado de llamadas una llamada Outbound, no hace nada
		}
		/* ********************************************************************************************************** */
	};
	
	// Evento que se ejecuta cuando se cambia un elemento de la cola de llamadas
	function QueueObjectChanged(mEICQueue, queueObj) {
		var tempQueue = new ActiveXObject("EICQueue.EICQueue.1");
		tempQueue = mEICQueue;
		var tempCallObj = new ActiveXObject("EICCallObject.EICCallObject.1");
		tempCallObj = queueObj;
		if(tempCallObj!=null) {
			valueCallId = tempCallObj.GetNamedAttributeS(attrCallId);
			valueRemoteName = tempCallObj.GetNamedAttributeS(attrRemoteName);
			valueRemoteId = tempCallObj.GetNamedAttributeS(attrRemoteId);
			valueCallDirection = tempCallObj.GetNamedAttributeS(attrCallDirection);
			valueWorkgroupName = tempCallObj.GetNamedAttributeS(attrWorkgroupName);
			valueCallState = tempCallObj.GetNamedAttributeS(attrCallState);
			valueConferenceId = tempCallObj.ConferenceId;
			
			// Actualizo el Select, que despliega las llamadas
			// 1ro -> recorro los elementos option del select, para buscar el callId que ha cambiado y actualizarlo
			var strSelect = "";
			var strTmp = "";
			var strTmp2 = "";
			var valueOption = "";
			var existe = false;
			var indiceTmp = 0;
			var selectSeleccionado = false;
			var i = 0;
			var largo = $("#listCalls").find("option").length // Retorno el numero de elementos options del select
			for(i=0;i<largo;i++) {
				strTmp = "#listCalls option:eq("+i+")";
				valueOption = $(strTmp).val();
				// Si existe en el Select el callId que ha cambiado
				if(valueOption == valueCallId) {
					// Comprueba si el elemento option del select existente esta seleccionado
					indiceTmp = $("#listCalls option").index($("#listCalls option:selected"));
					// si son iguales el option del select esta seleccionado
					if(indiceTmp == i) {
						selectSeleccionado = true;
					}
					// Reemplazo los valores del elemento actual, por sus nuevos valores
					strSelect = funcInicListCall(valueCallId,valueCallState,valueRemoteName,valueRemoteId,valueWorkgroupName,valueCallDirection,valueConferenceId);
					strTmp2 = "#listCalls option:eq("+i+")";
					$(strTmp2).remove();
					$("#listCalls").prepend(strSelect);
					existe = true;
					break;
				}
			}
			// Si el elemento a agregar no existe en el select
			if(existe == false) {
				// lo agrego como elemento nuevo al select en el 1er lugar
				strSelect = funcInicListCall(valueCallId,valueCallState,valueRemoteName,valueRemoteId,valueWorkgroupName,valueCallDirection,valueConferenceId);
				$("#listCalls").prepend(strSelect);
			}
			div_logSoftphone.innerText = "Queue Object Changed -> "+valueCallId+" \n"+div_logSoftphone.innerText;
		}
	};
	
	// Evento que se ejecuta cuando se elimina un elemento de la cola de llamados
	function QueueObjectRemoved(mEICQueue, objID) {
		var tempQueue = new ActiveXObject("EICQueue.EICQueue.1");
		tempQueue = mEICQueue;
		var strSelect = "";
		var strTmp = "";
		var strTmp2 = "";
		var valueOption = "";
		var existe = false;
		var indiceTmp = 0;
		var selectSeleccionado = false;
		var i = 0;
		var largo = $("#listCalls").find("option").length // Retorno el numero de elementos options del select
		for(i=0;i<largo;i++) {
			strTmp = "#listCalls option:eq("+i+")";
			valueOption = $(strTmp).val();
			// Si existe en el Select el callId que ha sido eliminado
			if(valueOption == objID) {
				strTmp2 = "#listCalls option:eq("+i+")";
				$(strTmp2).remove();
				break;
			}
		}
		div_logSoftphone.innerText = "Queue Object Removed -> "+objID+" \n"+div_logSoftphone.innerText;
	};
	
	function QueueStatsUpdated(mEICQueue, queueObj) {
		var tempQueue = new ActiveXObject("EICQueue.EICQueue.1");
		tempQueue = mEICQueue;
		var tempCallObj = new ActiveXObject("EICCallObject.EICCallObject.1");
		tempCallObj = queueObj;
		valueCallId = tempCallObj.GetNamedAttributeS(attrCallId);
		valueRemoteName = tempCallObj.GetNamedAttributeS(attrRemoteName);
		valueRemoteId = tempCallObj.GetNamedAttributeS(attrRemoteId);
		valueCallDirection = tempCallObj.GetNamedAttributeS(attrCallDirection);
		valueWorkgroupName = tempCallObj.GetNamedAttributeS(attrWorkgroupName);
		valueCallState = tempCallObj.GetNamedAttributeS(attrCallState);
		valueConferenceId = tempCallObj.ConferenceId;
		div_logSoftphone.innerText = "Queue Statistics Updated -> "+valueCallId+"\n"+div_logSoftphone.innerText;
		addActiveCalls(valueCallId,valueRemoteName,valueRemoteId,valueCallDirection,valueWorkgroupName,valueCallState,valueConferenceId);
	};
	
	function addActiveCalls(tmpCallId, tmpName, tmpAnexo, tmpDirecc, tmpGrupo, tmpEstado, tmpIdConf) {
		var flag = "no_existe";
		var elOptNew = document.createElement('option');
		var oList = frmConnect.elements["listCalls"];
		for(var i = 1; i < oList.options.length; i++) {
			if(oList.options[i].value==tmpCallId)
				flag = "existe";
		}
		if(flag=="no_existe") {
			var tmpStr = "idCall: "+tmpCallId+" | Name: "+tmpName+" | Anexo: "+tmpAnexo;
			tmpStr = tmpStr +" | Direcc: "+tmpDirecc+" | Grupo: "+tmpGrupo+" | Estado:"+tmpEstado+".";
			tmpStr = tmpStr +" | id Conf: "+tmpIdConf
			elOptNew.text = tmpStr
			elOptNew.value = tmpCallId;
			var elSel = document.getElementById('listCalls');
			try {
				elSel.add(elOptNew, null); // standards compliant; doesn't work in IE
			}
			catch(ex) {
				elSel.add(elOptNew); // IE only
			}			
		}
	};
	
	function funcPickup() {
		/* Obtengo el id de la llamada seleccionada de la lista de llamadas */
		var callId = $("#listCalls option:selected").val();
		if(callId == null) { /* Si no hay ninguna llamada seleccionada */
			alert("Debe seleccionar una llamada\nde la lista de llamadas, para contestar");
		}
		else {
			var userId = global_userCTI;
			try {
				var tempCallObj = new ActiveXObject("EICCallObject.EICCallObject.1");
			} catch (ex){
				alert("Error [new ActiveXObject('EICCallObject.EICCallObject.1')] [funcPickup]");
			}
			try {
				tempCallObj.id = callId;
			}
			catch (ex) {
				alert("Error [tempCallObj.id = callId] [funcPickup]");
			}
			try {
				tempCallObj.id = callId;
				tempCallObj.pickup(userId);
			}
			catch (ex) {
				alert("Error [tempCallObj.pickup(userId);] [funcPickup]");
			}
		}
	};
	
	function funcHold() {
		/* Obtengo el id de la llamada seleccionada de la lista de llamadas */
		var callId = $("#listCalls option:selected").val();
		if(callId == null) { /* Si no hay ninguna llamada seleccionada */
			alert("Debe seleccionar una llamada\nde la lista de llamadas, para retener");
		}
		else {
			try {
				var userId = global_userCTI;
				var tempCallObj = new ActiveXObject("EICCallObject.EICCallObject.1");
				tempCallObj.id = callId;
				tempCallObj.Hold("", userId);
			}
			catch (ex) {
				alert("Error [new ActiveXObject('EICCallObject.EICCallObject.1')] [funcHold]");
			}
		}
	};
	
	function funcDial(mNumberPhono) {
		/* Verificamos que usuario esta conectado a la central CIC, antes de Discar */
		if(EICConn.ConnectionValid==true) {
			var number = mNumberPhono;
			var tempCallObj = new ActiveXObject("EICCallObject.EICCallObject.1");
			tempCallObj.Dial(number, 'False');
		}
		else if(EICConn.ConnectionValid==false) {
			alert("Operación no permitida\nCentral Telefónica desconectada");
		}
		else {
			alert("Operación no permitida\nCentral Telefónica desconectada");
		}
	};
	
	function funcColgar() {
		/* Obtengo el id de la llamada seleccionada de la lista de llamadas */
		var callId = $("#listCalls option:selected").val();
		if(callId == null) { /* Si no hay ninguna llamada seleccionada */
			alert("Debe seleccionar una llamada\nde la lista de llamadas, para colgar");
		}
		else {
			try {
				var userId = global_userCTI;
				var tempCallObj = new ActiveXObject("EICCallObject.EICCallObject.1");
				tempCallObj.id = callId;
				tempCallObj.Disconnect(userId);
			}
			catch (ex) {
				alert("Error [new ActiveXObject('EICCallObject.EICCallObject.1')] [funcColgar]");
			}
		}
	};
	
	function funcClear() {
		$("#txtNumber").val("");
	};
	
	function funcTransfer(callIdTransferir) {
		callIdTransfer1 = '';
		callIdTransfer2 = '';
		var tmpEstado;
		/* var userId = $("#txtUserId").val(); */
		var userId = global_userCTI;
		try {
			var tempCallObj = new ActiveXObject("EICCallObject.EICCallObject.1");
			var callId = callIdTransferir;
			tempCallObj.id = callId;
			tempCallObj.Hold("", userId);
			callIdTransfer1 = callId;
		}
		catch (ex) {
			alert("Error [new ActiveXObject('EICCallObject.EICCallObject.1')] [funcTransfer]");
		}
	};
	
	function funcConsultTransferCall(numberConsult) {
		var number = numberConsult;
		var tempCallObj = new ActiveXObject("EICCallObject.EICCallObject.1");
		tempCallObj.Dial(number, 'False');
		callIdTransfer2 = tempCallObj.id;
	};
	
	function funcTransferCall() {
		/* var userId = $("#txtUserId").val(); */
		var userId = global_userCTI;
		var tempCallObj = new ActiveXObject("EICCallObject.EICCallObject.1");
		tempCallObj.id = callIdTransfer2;
		tempCallObj.ConsultTransfer(callIdTransfer1, userId);
	};
	
	function funcChangeStatus() {
		/* Antes de cambiar el estado, verifica que este conectado a la central */
		if(EICConn.ConnectionValid==true) {
			var mEICUser = new ActiveXObject("EICUser.EICUser.1");
			var tmpStatus;
			var tmpStatusChange;
			/* mEICUser.id = $("#txtUserId").val(); */
			mEICUser.id = global_userCTI;
			tmpStatus = mEICUser.StatusKey;
			if(tmpStatus=='available')
				tmpStatusChange = 'Do Not disturb';
			else 
				tmpStatusChange = 'available';
			mEICUser.StatusKey = tmpStatusChange;
			tmpStatus = mEICUser.StatusMessage;
			/* $("#txtStatus").val(tmpStatus); */
			div_logSoftphone.innerText = "Estado usuario -> "+tmpStatus+"\n"+div_logSoftphone.innerText;
		}
		else if(EICConn.ConnectionValid==false) {
			alert("Central Telefónica desconectada\nOperación no permitida");
		}
		else {
			alert("Central Telefónica desconectada\nOperación no permitida");
		}
	};
	
	/* Construye el Option del Select de la lista de llamadas */
	function funcInicListCall(valueCallId,valueCallState,valueRemoteName,valueRemoteId,valueWorkgroupName,valueCallDirection,valueConferenceId) {
		var strSelect = '';
		strSelect = "<option value='"+valueCallId+"'>";
		strSelect = strSelect+"Fono: "+valueRemoteId+" | ";
		strSelect = strSelect+"Estado: "+funcGetStatusString(valueCallState)+" | ";
		if(valueRemoteName != '%0UNKNOWNNAME0%') {
			strSelect = strSelect+"Name: "+valueRemoteName+" | ";
		}
		if(valueWorkgroupName!='') {
			strSelect = strSelect+"Grupo: "+valueWorkgroupName+" | ";
		}
		strSelect = strSelect+"idCall: "+valueCallId+" | ";
		/* strSelect = strSelect+"Direcc: "+valueCallDirection+" | "; */
		/* strSelect = strSelect+"idConf: "+valueConferenceId; */
		strSelect = strSelect+"</option>";
		return strSelect;
	};
	
	/* Devuelve como texto el estado de la llamada */
	function funcGetStatusString(varState) {
		var strStatus = '';
		if(varState=='A') { strStatus = 'Nueva llamada'; }
		else if(varState=='C') { strStatus = 'Conectada'; }
		else if(varState=='H') { strStatus = 'Retenida'; }
		else if(varState=='I') { strStatus = 'Desconexión Local'; }
		else if(varState=='E') { strStatus = 'Desconexión Remota'; }
		else if(varState=='S') { strStatus = 'Marcando'; }
		else { strStatus = ''; }
		return strStatus;
	};
	
	function funcCreateConf() {
		var idCallConf;
		var initialCallId = $("#listCalls option:selected").val();
		globalCallObjConf.id = initialCallId;
		globalConfObj.Create(globalCallObjConf);
		idCallConf = globalConfObj.id
		alert("idCall->"+initialCallId);
		alert("idConf->"+idCallConf);
		//globalConfObj.DisconnectParty(initialCallId);
	};
	
	function funcAddConf() {
		var idCall = $("#listCalls option:selected").val();
		globalCallObjConf.id = idCall;
		globalConfObj.Add(globalCallObjConf);
		alert("CONFERENCIA AGREGADA");
	};
/* *********************************************************************************************************** */
