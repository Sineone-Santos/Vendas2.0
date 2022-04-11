<template>
    <div id="boleto" class="w-100">
        <button @click="printBoleto()" class="btn-print btn btn-info rounded-circle text-white p-3">
            <i style="font-size: 25px " class="fa fa-print" aria-hidden="true"></i>
        </button>
        <div class="container mt-4 border-left border-right">              
            <div class="row align-items-end liner-bottom-solid">
                <div class="col-2 p-0">
                    <img src="../assets/BB.jpg" class="img-fluid">
                </div>
                <div class="col-1 p-0 liner-left-solid text-left liner-right-solid">
                    <span class="ml-2 fs-20 fw-800">001-9</span>
                </div>
                <div class="col-9 p-0 text-right">
                    <span class="mr-3 fs-18 fw-600">00190.00009 03393.879006 00135.721173 9 89510000009000</span>
                </div>
            </div>
            <div class="row lign-items-end liner-bottom-solid">
                <div class="col-6 p-0 text-left">
                    <label class="ml-1">Beneficiario</label>
                    <p class="ml-1">ITS TELECOMUNICACOES LTDA RUA SOLDADO LUIZ GONZAGA 
                        DAS VIRGENS 111, SALAS 501 502 EDF LIZ  CORPOR
                    </p>
                </div>
                <div class="col-2 p-0 liner-left-solid text-left">
                    <label class="ml-1">Agência/Código do Beneficiário</label>
                    <p class="ml-1">3429-0 / 00007762-3</p>
                </div>
                <div class="col-1 p-0 liner-left-solid text-left">
                    <label class="ml-1">Espécie</label>
                    <p class="ml-1">R$</p>
                </div>
                <div class="col-1 p-0 liner-left-solid text-left">
                    <label class="ml-1">Quantidade</label>
                </div>
                <div class="col-2 p-0 liner-left-solid text-left">
                    <label class="ml-1">Nosso numero</label>
                    <p class="ml-1">33938790000135721</p>
                </div>
            </div>
            <div class="row lign-items-end liner-bottom-solid">
                <div class="col-4 p-0 text-left">
                    <label class="ml-1">Número do documento</label>
                    <p class="ml-1">802413</p>
                </div>
                <div class="col-2 p-0 liner-left-solid text-left">
                    <label class="ml-1">CPF/CNPJ</label>
                    <p class="ml-1">08.772.214/0001-98</p>
                </div>
                <div class="col-2 p-0 liner-left-solid text-left">
                    <label class="ml-1">Vencimento</label>
                    <p class="ml-1">10/04/2022</p>
                </div>
                <div class="col-4 p-0 liner-left-solid text-left">
                    <label class="ml-1">Valor documento</label>
                    <p class="ml-1">90,00</p>
                </div>
            </div>
            <div class="row lign-items-end liner-bottom-solid">
                <div class="col-3 p-0 text-left">
                    <label class="ml-1">(-) Desconto / Abatimentos</label>
                    <p><br/></p>
                </div>
                <div class="col-2 p-0 liner-left-solid text-left">
                    <label class="ml-1">s (-) Outras deduções</label>   
                </div>
                <div class="col-2 p-0 liner-left-solid text-left">
                    <label class="ml-1">(+) Mora / Multa / Juros</label>
                </div>
                <div class="col-2 p-0 liner-left-solid text-left">
                    <label class="ml-1">(+) Outros acréscimos</label>
                </div>
                <div class="col-3 p-0 liner-left-solid text-left">
                    <label class="ml-1">(=) Valor cobrado</label>
                </div>
            </div>
            <div class="row lign-items-end liner-bottom-solid">
                <div class="col p-0 text-left">
                    <label class="ml-1">Demonstrativo</label>
                    <p>- Referente ao Acesso a Internet via Fibra de 11/03/2022 a 10/04/2022</p>
                    <br/>
                    <br/>
                </div>
            </div>
            <div class="row lign-items-end liner-bottom-solid">
                <div class="col p-0 text-left">
                    <label class="ml-1">Informações importantes</label>
                    <br/>
                    <br/>
                    <br/>
                </div>
            </div>
            <div class="row lign-items-end liner-bottom-solid">
                <div class="col p-0 text-left">
                    <label class="ml-1">Pagador</label>
                    <div class="d-flex mt-2" style="margin-left: 30%">
                        <div>
                            <p class="fs-14">Sineone de jesus dos santos</p>
                            <p class="fs-14">AVENIDA PRINCESA ISABEL, 27 - PRINCESA ISABEL, ATRÁS DA IGREJA CATÓLICA, SU
                            CONQUISTA - ILHÉUS - BA - CEP: 45650-450 - BAR DO CABOCO</p>
                        </div>
                        <div class="ml-auto mr-5">
                            <p class="fs-14">47239</p>
                        </div>
                    </div>
                </div>
            </div>
            <div>
                <br/>
                <br/>
                <br/>
                <div class="row liner-bottom-dashed p-2"></div>
                <br/>
                <br/>
                <br/>
            </div>
            <div class="row align-items-end liner-bottom-solid">
                <div class="col-2 p-0">
                    <img src="../assets/BB.jpg" class="img-fluid">
                </div>
                <div class="col-1 p-0 liner-left-solid text-left liner-right-solid">
                    <span class="ml-2 fs-20 fw-800">001-9</span>
                </div>
                <div class="col-9 p-0 text-right">
                    <span class="mr-3 fs-18 fw-600">00190.00009 03393.879006 00135.721173 9 89510000009000</span>
                </div>
            </div>
            <div class="row liner-bottom-solid align-items-end">
                <div class="col-9 p-0">
                    <p class="ml-1 text-left">Local de Pagamento</p>
                    <p class="ml-1 text-left">PAGÁVEL EM QUALQUER AGÊNCIA BANCÁRIA, CASAS LOTÉRICAS, CX ELETRÔNICOS OU INTERNET BANKING</p>
                </div>
                <div class="col-3 liner-left-solid p-0">
                    <p class="ml-1 text-left">Vencimento</p>
                    <p class="text-right">10/04/2022</p>
                </div>
            </div>
            <div class="row liner-bottom-solid">
                <div class="col-9 p-0">
                    <p class="ml-1 text-left">Beneficiário</p>
                    <p class="ml-1 text-left">TS TELECOMUNICACOES LTDA
                    RUA SOLDADO LUIZ GONZAGA DAS VIRGENS 111, SALAS 501 502 EDF LIZ CORPORAT, SALVADOR - BA</p>
                </div>
                <div class="col-3 liner-left-solid p-0">
                    <p class="ml-1 text-left">Agência/Código do Beneficiário</p>
                    <p class="text-right">3429-0 / 00007762-3</p>
                </div>
            </div>
            <div class="row liner-bottom-solid">
                <div class="col-2 p-0">
                    <p class="ml-1 text-left">Data do documento</p>
                    <p class="ml-1 text-left">28/03/2022</p>
                </div>
                <div class="col-3 liner-left-solid p-0">
                    <p class="ml-1 text-left">Nº Documento</p>
                    <p class="ml-1 text-left">802413</p>
                </div>
                <div class="col-1 liner-left-solid p-0">
                    <p class="ml-1 text-left">Espécie Doc.</p>
                    <p class="ml-1 text-left">DM</p>
                </div>
                <div class="col-1 liner-left-solid p-0">
                    <p class="ml-1 text-left">Aceite</p>
                    <p class="ml-1 text-left">A</p>
                </div>
                <div class="col-2 liner-left-solid p-0">
                    <p class="ml-1 text-left">Data Processamento</p>
                    <p class="ml-1 text-left">28/03/2022</p>
                </div>
                <div class="col-3 liner-left-solid p-0">
                    <p class="ml-1 text-left">Nosso Número</p>
                    <p class="text-right">33938790000135721</p>
                </div>
            </div>
            <div class="row liner-bottom-solid">
                <div class="col-2 p-0">
                    <p class="ml-1 text-left">Uso do banco</p>
                    <p class="ml-1 text-left"></p>
                </div>
                <div class="col-2 liner-left-solid p-0">
                    <p class="ml-1 text-left">Carteira</p>
                    <p class="ml-1 text-left">17</p>
                </div>
                <div class="col-1 liner-left-solid p-0">
                    <p class="ml-1 text-left">Espécie</p>
                    <p class="ml-1 text-left">R$</p>
                </div>
                <div class="col-2 liner-left-solid p-0">
                    <p class="ml-1 text-left">Quantidade</p>
                    <p class="ml-1 text-left"></p>
                </div>
                <div class="col-2 liner-left-solid p-0">
                    <p class="ml-1 text-left">Valor documento</p>
                    <p class="ml-1 text-left"></p>
                </div>
                <div class="col-3 liner-left-solid p-0">
                    <p class="ml-1 text-left">(=) Valor documento</p>
                    <p class="text-right">90,00</p>
                </div>
            </div>
            <div class="row liner-bottom-solid">
                <div class="col-9 p-0">
                    <p class="ml-1 text-left">Instruções (Texto de responsabilidade do beneficiário) </p>
                    <p class="ml-1 text-left">Após vencimento cobrar multa de R$ 1,80 e juros de R$ 0,03 ao dia,<br/>
                        Desconto de 10,10 até um dia antes do vencimento</p>
                    <br/>
                    <p class="ml-1 text-left">
                    Fidelidade Carência: 365 dias | Data inicial: DATA_INICIO_FIDELIDADE | Desconto aplicado: R$ 90.00
                    <br/>
                    Emissão de segunda via em www.itsbrasil.net.</p>
                </div>
                <div class="col-3 liner-left-solid p-0">         
                    <div class="row m-0 mb-2">
                        <p class="ml-1 text-left">(-) Desconto / Abatimentos</p>
                        <p class="text-right w-100"><br/></p>
                    </div>
                    <div class="row liner-top-solid m-0 mb-2">
                        <p class="ml-1 text-left">(-) Outras deduções</p>
                        <p class="text-right w-100"><br/></p>
                    </div>
                    <div class="row liner-top-solid m-0 mb-2">
                        <p class="ml-1 text-left">(+) Mora / Multa / Juros</p>
                        <p class="text-right w-100"><br/></p>
                    </div>
                    <div class="row liner-top-solid m-0 mb-2">
                        <p class="ml-1 text-left">(+) Outros acréscimos</p>
                        <p class="text-right w-100"><br/></p>
                    </div>
                    <div class="row liner-top-solid m-0 mb-2">
                        <p class="ml-1 text-left">(=) Valor cobrado</p>
                        <p class="text-right w-100"><br/></p>
                    </div>
                </div>
            </div>
            <div class="row liner-bottom-solid">
                <div class="col-9 p-0">
                    <div class="d-flex w-100">
                        <div>
                        <p class="ml-1 text-left">Pagador</p>
                        <p class="ml-1 text-left">SINEONE DE JESUS DOS SANTOS</p>
                        <p class="ml-1 text-left">
                            AVENIDA PRINCESA ISABEL, 27 - PRINCESA ISABEL, ATRÁS DA IGREJA CATÓLICA, SUBUNDO PARA CASCALHEIRA
                            CONQUISTA - ILHÉUS - BA - CEP: 45650-450 - BAR DO CABOCO
                        </p>
                    </div>
                    <div class="ml-auto">
                        <br/>
                        <p>47239</p>
                        <p>CPF/CNPJ: 082.985.595-50</p>
                    </div>
                    </div>
                </div>
                <div class="col-3 liner-left-solid p-0">
                    <p class="ml-1 text-left">Cód. baixa</p>
                    <p class="text-right"></p>
                </div>
            </div>
            <div class="row">
                <div class="col-6">
                    <p class="ml-1 text-left">
                        Sacador/Avalista
                    </p>
                    <div class="d-flex">
                        <img src="../assets/cod-barras.png" alt="" class="w-100" style="height: 80px">
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>

export default {
    methods: {
        printBoleto(){
            window.print()
        }
    }
}
</script>


<style scoped>
.btn-print{
    position: fixed;
    z-index: 99;
    margin-top: 80vh;
    margin-left: 75vh;
}
.liner-bottom-dashed{
    border-bottom: 5px;
    border-style: hidden hidden dashed hidden;
}
.liner-bottom-solid{
    border-bottom: solid 2px;
}
.liner-left-solid{
    border-left: solid 2px;
}
.liner-top-solid{
    border-top: solid 2px;
}
.liner-right-solid{
    border-right: solid 2px;
}
.fs-20{
    font-size: 20px;
}
.fs-18{
    font-size: 18px;
}
.fs-16{
    font-size: 16px;
}
.fs-14{
    font-size: 14px;
}
.fw-800{
     font-weight: 800;
}
.fw-600{
     font-weight: 600;
}
.fw-400{
     font-weight: 400;
}
.logo{
    height: 20px;
}
p{
    font-size: 11px;
    margin: 0px;
    font-weight: 800;
}
label{
    font-size: 11px;
    padding: 0px;
    margin: 0px;
}
</style>