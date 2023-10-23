CREATE FUNCTION CalculaImposto (employeeSalary DECIMAL(10, 2)) RETURNS DECIMAL(10, 2)
BEGIN
    DECLARE tax DECIMAL(10, 2);
    SET tax = employeeSalary * 0.2; -- Imposto de 20%
    RETURN tax;
END;