<?php

namespace Vitab\NsTask;

class OutputHandler
{
    public function output(): void
    {
        $salary = $this->getData('salary');
        $tax_exemption = $this->getData('tax_exemption');
        $income = $this->getData('income');

        $taxCalculator = new TaxCalculator();
        $tax = $taxCalculator->calculateTax($salary, $tax_exemption, $income);

        echo $tax;
    }

    public function getData(string $fileName): int
    {
        $filePath = (__DIR__ . '/database/' . $fileName . '.json');
        return (int) json_decode(file_get_contents($filePath));
    }
}
