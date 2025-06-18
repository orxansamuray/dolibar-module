# Dolibarr AzAccounting Module

Bu repozitoriya Dolibarr ERP sisteminə Azərbaycan mühasibatliq imkanlari əlavə etməyi hədəfləyən **AzAccounting** modulunun ilkin versiyasını ehtiva edir.

## Quraşdırma

1. `azaccounting` qovluğunu Dolibarr-ın `htdocs/custom/` qovluğuna kopyalayın.
2. Dolibarr-a administrator kimi daxil olun və *AzAccounting* modulunu aktiv edin.
3. Lazım gələrsə, `azaccounting/sql` qovluğundakı SQL skriptlərini icra edin.

## İndiki vəziyyət

Layihə hələ inkişaf mərhələsindədir; bir çox fayl nümunə şəklində və ya boşdur. Dəyişiklikləri `doc` qovluğundakı təlimatlara əsasən izləyə bilərsiniz.

## Sənədlər və skriptlər

Əlavə sənədlər `azaccounting/doc` qovluğunda yerləşir. Gələcək yeniləmələr üçün `azaccounting/scripts` qovluğunda nümunə PHP skriptləri mövcuddur. Skriptləri işə salmaq üçün komanda sətrində aşağıdakı kimi PHP-dən istifadə edin:

```bash
php path/to/dolibarr/htdocs/custom/azaccounting/scripts/update_exchange_rates.php
```
