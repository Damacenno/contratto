<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Template;

class ContractTemplateSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Template::create([
            'contract_type_id' => 1,
            'version' => 1,
            'html_content' => <<<'HTML'
<div style="font-family: 'Times New Roman', serif; font-size: 12pt; line-height: 1.5; text-align: justify;">
    <h1 style="text-align:center; font-size:14pt; margin-bottom:24px;"> CONTRATO DE PRESTAÇÃO DE SERVIÇOS </h1>

    <p style="text-indent:1.25cm;">
        <strong>${{ company_name }}</strong>, inscrita no CNPJ <strong>${{ company_document }}</strong>, com sede em <strong>${{ company_city }}</strong>, doravante denominada <strong>CONTRATANTE</strong>, firma o presente contrato com <strong>${{ contractor_name }}</strong>, doravante denominado <strong>CONTRATADO</strong>.
    </p>

    <h2 style="font-size:12pt; margin-top:24px;"> CLÁUSULA PRIMEIRA – DO OBJETO </h2>
    <p style="text-indent:1.25cm;">
        O presente contrato tem como objeto prestar serviços de mídias digitais, que visam divulgar o produto/marca/slogan da CONTRATANTE, quais sejam:
    </p>
    <p style="margin-left:1.25cm;">
        I – Anúncios nas mídias sociais Facebook e Instagram;<br>
        II – Anúncios no Google Ads;<br>
        III – Desenvolver estratégias de marketing digital.
    </p>

    <h2 style="font-size:12pt; margin-top:24px;"> CLÁUSULA SEGUNDA – DA VIGÊNCIA </h2>
    <p style="text-indent:1.25cm;">
        O presente contrato terá vigência a partir da assinatura e pelo prazo de <strong>${{ contract_duration_month }}</strong> meses, prorrogáveis pelo mesmo período, mediante concordância expressa pelas partes, devidamente formalizado por termo aditivo ou outro meio idôneo. A ausência desse expediente implicará na automática rescisão contratual, independente de notificação.
    </p>

    <h2 style="font-size:12pt; margin-top:24px;"> CLÁUSULA TERCEIRA – DA REMUNERAÇÃO </h2>
    <p style="text-indent:1.25cm;">
        O pagamento efetuado pela CONTRATANTE em favor do CONTRATADO será de <strong>${{ payment_total }}</strong>, sendo <strong>${{ payment_initial }}</strong> no início do contrato e <strong>${{ payment_final }}</strong> após <strong>${{ regret_period_days }}</strong> dias, caso a CONTRATANTE decida manter a parceria.
    </p>
    <p style="text-indent:1.25cm;">
        <strong>Parágrafo Primeiro:</strong> Não haverá qualquer custo adicional em desfavor da CONTRATANTE durante o deslinde deste instrumento ou de alteração do percentual supra, exceto caso haja concordância expressa e motivada das partes.
    </p>
    <p style="text-indent:1.25cm;">
        <strong>Parágrafo Segundo:</strong> O pagamento deverá ser efetuado na agência <strong>${{ company_agency }}</strong>, conta <strong>${{ company_account }}</strong>, banco <strong>${{ company_bank }}</strong>, via Pix <strong>${{ company_pix }}</strong> ou boleto bancário.
    </p>

    <h2 style="font-size:12pt; margin-top:24px;"> CLÁUSULA QUARTA – DAS OBRIGAÇÕES </h2>
    <p style="text-indent:1.25cm;"><strong>Das Obrigações da Contratante:</strong></p>
    <p style="margin-left:1.25cm;">
        I – Fornecer todas as informações pertinentes para execução dos trabalhos;<br>
        II – Cumprir com todas as orientações repassadas pelo CONTRATADO.
    </p>
    <p style="text-indent:1.25cm;"><strong>Das Obrigações do Contratado:</strong></p>
    <p style="margin-left:1.25cm;">
        I – Prestar serviço com excelência, zelo e dedicação;<br>
        II – Utilizar conhecimentos técnicos na execução do contrato;<br>
        III – Contribuir com ideias e métodos eficazes;<br>
        IV – Realizar pesquisas quanto à utilização de mídias e imagens;<br>
        V – Responder por seus atos e publicações realizadas;<br>
        VI – Manter absoluto sigilo sobre informações do contrato;<br>
        VII – Fornecer relatórios diários, semanais e mensais.
    </p>

    <h2 style="font-size:12pt; margin-top:24px;"> CLÁUSULA QUINTA – DO VALOR INVESTIDO </h2>
    <p style="text-indent:1.25cm;">
        O investimento será estipulado em reunião, descontado diretamente no cartão de crédito da CONTRATANTE, sendo os pagamentos realizados diretamente nas plataformas utilizadas.
    </p>
    <p style="text-indent:1.25cm;">
        <strong>Parágrafo Único:</strong> Caso o custo supere o valor acordado sem autorização, o CONTRATADO deverá devolver a diferença corrigida.
    </p>

    <h2 style="font-size:12pt; margin-top:24px;"> CLÁUSULA SEXTA – DA RESCISÃO </h2>
    <p style="text-indent:1.25cm;">
        O presente contrato poderá ser rescindido por qualquer uma das partes, a qualquer momento, sem aviso prévio.
    </p>

    <h2 style="font-size:12pt; margin-top:24px;"> CLÁUSULA SÉTIMA – DO SIGILO E CONFIDENCIALIDADE </h2>
    <p style="text-indent:1.25cm;">
        As partes comprometem-se a manter confidencialidade sobre quaisquer dados obtidos em razão deste contrato, mesmo após seu término.
    </p>

    <h2 style="font-size:12pt; margin-top:24px;"> CLÁUSULA OITAVA – DA AUSÊNCIA DE VÍNCULO EMPREGATÍCIO </h2>
    <p style="text-indent:1.25cm;">
        O presente contrato não estabelece vínculo empregatício entre as partes.
    </p>

    <h2 style="font-size:12pt; margin-top:24px;"> CLÁUSULA NONA – DA CESSÃO E TRANSFERÊNCIA </h2>
    <p style="text-indent:1.25cm;">
        É vedada a transferência do objeto deste contrato a terceiros sem autorização expressa.
    </p>

    <h2 style="font-size:12pt; margin-top:24px;"> CLÁUSULA DÉCIMA PRIMEIRA </h2>
    <p style="text-indent:1.25cm;">
        E por estarem assim justas e acordadas, assinam o presente contrato.
    </p>

    <p style="text-align:right; margin-top:32px;">
        <strong>${{ company_city }}</strong>, <strong>${{ contract_date }}</strong>.
    </p>

    <br><br>

    <p style="text-align:center;">
        _______________<br>
        <strong>${{ contractor_name }}</strong><br>
        CONTRATANTE
    </p>

    <br><br>

    <p style="text-align:center;">
        _______________<br>
        CONTRATADO
    </p>
</div>
HTML
        ]);
    }
}
