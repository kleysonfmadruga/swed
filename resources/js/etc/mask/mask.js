jQuery(function($){
    $("input.cnpj").mask("ZZ.ZZZ.ZZZ/ZZZZ-ZZ", {translation:  {'Z': {pattern: /[0-9]/}}});
    $("input.telefone").mask("(ZZ) ZZZZ-ZZZZ", {translation:  {'Z': {pattern: /[0-9]/}}});
    $("input.telefoneSemDDD").mask("ZZZZ-ZZZZ", {translation:  {'Z': {pattern: /[0-9]/}}});
    $("input.celular").mask("(ZZ) ZZZZZ-ZZZZ", {translation:  {'Z': {pattern: /[0-9]/}}});            
    $('input.certidao').mask('ZZZZZZ.ZZ.ZZ.ZZZZ.Z.ZZZZZ.ZZZ.ZZZZZZZ-ZZ', {translation:  {'Z': {pattern: /[0-9]/}}});
    $('input.year').mask('ZZZZ', {translation: {'Z': {pattern: /[0-9]/}}});
    // $("input.cns").mask("999 9999 9999 9999");
    $("input.data").mask("ZZ/ZZ/ZZZZ", {translation:  {'Z': {pattern: /[0-9]/}}});
    $("input.dayMonth").mask("99/99");
    // $("input.nis").mask("999.999.999-99");
    $("input.cpf").mask("ZZZ.ZZZ.ZZZ-ZZ", {translation:  {'Z': {pattern: /[0-9]/}}});
    $("input.certidao-nascimento").mask("ZZZZZZ ZZ ZZ ZZZZ Z ZZZZZ ZZZZZZZ ZZ", {translation:  {'Z': {pattern: /[0-9]/}}});
    // $("input.codigoInep").mask("99999999");
    $("input.cep").mask("ZZZZZ-ZZZ", {translation:  {'Z': {pattern: /[0-9]/}}});
    $("input.chTime").mask("#99:99", {reverse:true});
    $("input.time").mask("99:99", {reverse:true});
    $("input.inep").mask("99999999");
    $("input.numberLimit").mask("99999999");
    $("input.max4").mask("9999");
    $("input.max3Numb").mask("999");
    $("input.time-in-time").mask("ZZh~ZZh", {translation:  {'Z': {pattern: /[0-9]/}}});
    $('input.max2').mask('ZZ', {
        translation: {'Z': {pattern: /[0-9]/}},
        reverse: true
    });
    $("input.numberOnly").mask("#Z", {
        translation:  {'Z': {pattern: /[0-9]/}}, 
        reverse:true        
    }, );
    // $("input.certidaoNova").mask("999999 99 99 9999 9 99999 999 9999999 99");
});
