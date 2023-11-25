  function via() {
    var option = document.getElementById("cNvias").value;
    if (option === "1x1") {
        document.getElementById('cV1').style.cssText = 'visibility:visible';
        document.getElementById('cV1').style.backgroundColor = '#D9D9F3';
        document.getElementById('cV2').style.cssText = 'visibility:visible';
        document.getElementById('cV2').style.backgroundColor = '#FFCCFF';
        document.getElementById('cV3').style.cssText = 'visibility:hidden';
        document.getElementById('cV4').style.cssText = 'visibility:hidden';
        document.getElementById('cV5').style.cssText = 'visibility:hidden';
        document.getElementById('cV6').style.cssText = 'visibility:hidden';

    }
    if (option === "2x2") {
        document.getElementById('cV1').style.cssText = 'visibility:visible';
        document.getElementById('cV1').style.backgroundColor = '#D9D9F3';
        document.getElementById('cV2').style.cssText = 'visibility:visible';
        document.getElementById('cV2').style.backgroundColor = '#D9D9F3';
        document.getElementById('cV3').style.cssText = 'visibility:visible';
        document.getElementById('cV3').style.backgroundColor = '#FFCCFF';
        document.getElementById('cV4').style.cssText = 'visibility:visible';
        document.getElementById('cV4').style.backgroundColor = '#FFCCFF';
        document.getElementById('cV5').style.cssText = 'visibility:hidden';
        document.getElementById('cV6').style.cssText = 'visibility:hidden';
    }
    if (option === "3x3") {
        document.getElementById('cV1').style.cssText = 'visibility:visible';
        document.getElementById('cV1').style.backgroundColor = '#D9D9F3';
        document.getElementById('cV2').style.cssText = 'visibility:visible';
        document.getElementById('cV2').style.backgroundColor = '#D9D9F3';
        document.getElementById('cV3').style.cssText = 'visibility:visible';
        document.getElementById('cV3').style.backgroundColor = '#D9D9F3';
        document.getElementById('cV4').style.cssText = 'visibility:visible';
        document.getElementById('cV4').style.backgroundColor = '#FFCCFF';
        document.getElementById('cV5').style.cssText = 'visibility:visible';
        document.getElementById('cV5').style.backgroundColor = '#FFCCFF';
        document.getElementById('cV6').style.cssText = 'visibility:visible';
        document.getElementById('cV6').style.backgroundColor = '#FFCCFF';
    }
    if (option === "1x2") {
        document.getElementById('cV1').style.cssText = 'visibility:visible';
        document.getElementById('cV1').style.backgroundColor = '#D9D9F3';
        document.getElementById('cV2').style.cssText = 'visibility:visible';
        document.getElementById('cV2').style.backgroundColor = '#FFCCFF';
        document.getElementById('cV3').style.cssText = 'visibility:visible';
        document.getElementById('cV3').style.backgroundColor = '#FFCCFF';
        document.getElementById('cV4').style.cssText = 'visibility:hidden';
        document.getElementById('cV5').style.cssText = 'visibility:hidden';
        document.getElementById('cV6').style.cssText = 'visibility:hidden';
    }
    if (option === "2x1") {

        document.getElementById('cV1').style.cssText = 'visibility:visible';
        document.getElementById('cV1').style.backgroundColor = '#D9D9F3';
        document.getElementById('cV2').style.cssText = 'visibility:visible';
        document.getElementById('cV2').style.backgroundColor = '#D9D9F3';
        document.getElementById('cV3').style.cssText = 'visibility:visible';
        document.getElementById('cV3').style.backgroundColor = '#FFCCFF';
        document.getElementById('cV4').style.cssText = 'visibility:hidden';
        document.getElementById('cV5').style.cssText = 'visibility:hidden';
        document.getElementById('cV6').style.cssText = 'visibility:hidden';
    }

    if (option === "2x3") {
        document.getElementById('cV1').style.cssText = 'visibility:visible';
        document.getElementById('cV1').style.backgroundColor = '#D9D9F3';
        document.getElementById('cV2').style.cssText = 'visibility:visible';
        document.getElementById('cV2').style.backgroundColor = '#D9D9F3';
        document.getElementById('cV3').style.cssText = 'visibility:visible';
        document.getElementById('cV3').style.backgroundColor = '#FFCCFF';
        document.getElementById('cV4').style.cssText = 'visibility:visible';
        document.getElementById('cV4').style.backgroundColor = '#FFCCFF';
        document.getElementById('cV5').style.cssText = 'visibility:visible';
        document.getElementById('cV5').style.backgroundColor = '#FFCCFF';
        document.getElementById('cV6').style.cssText = 'visibility:hidden';
    }
    if (option === "3x2") {
        document.getElementById('cV1').style.cssText = 'visibility:visible';
        document.getElementById('cV1').style.backgroundColor = '#D9D9F3';
        document.getElementById('cV2').style.cssText = 'visibility:visible';
        document.getElementById('cV2').style.backgroundColor = '#D9D9F3';
        document.getElementById('cV3').style.cssText = 'visibility:visible';
        document.getElementById('cV3').style.backgroundColor = '#D9D9F3';
        document.getElementById('cV4').style.cssText = 'visibility:visible';
        document.getElementById('cV4').style.backgroundColor = '#FFCCFF';
        document.getElementById('cV5').style.cssText = 'visibility:visible';
        document.getElementById('cV5').style.backgroundColor = '#FFCCFF';
        document.getElementById('cV6').style.cssText = 'visibility:hidden';
    }
}

function terrabt() {
    document.fxrodtipo.tPedra.disabled = true;
    document.fxrodtipo.tPedra.value = "";
    document.fxrodtipo.tRevsuperf.disabled = true;
    document.fxrodtipo.tRevsuperf.value = "";
    document.fxrodtipo.tBb.disabled = true;
    document.fxrodtipo.tBb.value = "";
    document.fxrodtipo.tBclas.disabled = true;
    document.fxrodtipo.tBclas.value = "";
}

function pedra() {
    document.fxrodtipo.tTerrabt.disabled = true;
    document.fxrodtipo.tTerrabt.value = "";
    document.fxrodtipo.tRevsuperf.disabled = true;
    document.fxrodtipo.tRevsuperf.value = "";
    document.fxrodtipo.tBb.disabled = true;
    document.fxrodtipo.tBb.value = "";
    document.fxrodtipo.tBclas.disabled = true;
    document.fxrodtipo.tBclas.value = "";

}
function revsupf() {
    document.fxrodtipo.tTerrabt.disabled = true;
    document.fxrodtipo.tTerrabt.value = "";
    document.fxrodtipo.tPedra.disabled = true;
    document.fxrodtipo.tPedra.value = "";
    document.fxrodtipo.tBb.disabled = true;
    document.fxrodtipo.tBb.value = "";
    document.fxrodtipo.tBclas.disabled = true;
    document.fxrodtipo.tBclas.value = "";
}
function bb() {
    document.fxrodtipo.tTerrabt.disabled = true;
    document.fxrodtipo.tTerrabt.value = "";
    document.fxrodtipo.tPedra.disabled = true;
    document.fxrodtipo.tPedra.value = "";
    document.fxrodtipo.tRevsuperf.disabled = true;
    document.fxrodtipo.tRevsuperf.value = "";
    document.fxrodtipo.tBclas.disabled = true;
    document.fxrodtipo.tBclas.value = "";
}

function bclas() {
    document.fxrodtipo.tTerrabt.disabled = true;
    document.fxrodtipo.tTerrabt.value = "";
    document.fxrodtipo.tPedra.disabled = true;
    document.fxrodtipo.tPedra.value = "";
    document.fxrodtipo.tBb.disabled = true;
    document.fxrodtipo.tBb.value = "";
    document.fxrodtipo.tRevsuperf.disabled = true;
    document.fxrodtipo.tRevsuperf.value = "";
}

function limpatipo() {
    document.fxrodtipo.tTerrabt.value = "";
    document.fxrodtipo.tTerrabt.disabled = false;
    document.fxrodtipo.tPedra.value = "";
    document.fxrodtipo.tPedra.disabled = false;
    document.fxrodtipo.tRevsuperf.value = "";
    document.fxrodtipo.tRevsuperf.disabled = false;
    document.fxrodtipo.tBb.value = "";
    document.fxrodtipo.tBb.disabled = false;
    document.fxrodtipo.tBclas.value = "";
    document.fxrodtipo.tBclas.disabled = false;
}

