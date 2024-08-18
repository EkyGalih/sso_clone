## INSTALASI

Untuk instalasi menggunakan docker, 
Anda menginstall beberapa environment pada VM (virtual machine) seperti

- git.
- docker.
- docker-compose.

Jika sudah menginstall anda dapat melanjutkan langkah selanjutnya 

### 1. Clone repository

Disarankan untuk menaruh project repository berada di folder `/home` akan tetapi bebas untuk menyimpan project di manapun.


Clone with SSH

```
git clone git@gitlab.com:diskominfotikntb/sso.git
```

Clone with HTTPS

```
git clone https://gitlab.com/diskominfotikntb/sso.git
```

### 2. Perintah CLI Build Docker

Lakukan copy .env.example menjadi .env

*NOTED (.env.example sudah dilakukan setting production)*

```
cp .env.example .env
```

Ubah environment `docker-compose.yml` pada bagian

-   service > app > image
-   service > app > container_name
-   service > app > volumes
-   service > app > networks

Sesuaikan dengan nama aplikasi atau nama image (container) supaya tidak bentrok 
jika di VM terdapat beberapa container. Jika setting evironment sudah sesuai dengan kebutuhan 
silahkan lakukan perintah CLI di bawah ini

Build container aplikasi / apps

```
docker-compose build app
```

Jalankan container aplikasi yang telah di build

```
docker-compose up -d
```

Untuk melihat container yang jalan

```
docker-compose ps
```

Untuk melakukan install composer

```
docker-compose exec app composer install
```

Untuk melakukan key generate

```
docker-compose exec app php artisan key:generate
```

Sekarang untuk menjalankan dapat dilihat dengan cara

```
http://server_domain_or_IP:8000
```
Untuk port akan menyesuaikan dengan yang di setting pada `docker-compose.yml`

## Pendukung
### Database MYSQL

Saya menyarankan untuk membuat Database di luar VM jika membutuhkan misal seperti *load balance*.

untuk `.env` pada aplikasi perlu dilihat bahwa sebagai berikut

```
DB_CONNECTION=mysql
DB_HOST=172.22.144.1
DB_PORT=3306
DB_DATABASE=sso
DB_USERNAME=sso
DB_PASSWORD=password
```

DB HOST merupakan host/ip VM, karena network menggunakan brigde tentu container akan dapat berinteraksi dengan satu segmen jaringan
sedangkan untuk username dan password anda perlu membuat ALLOW GRANT agar user itu dapat di lihat melalui IP diluar localhost. Untuk perintahnya seperti berikut:

```
mysql -u root -p
```

```
USE mysql;
```

Silahkan create user dan ALLOW GRANT yang akan digunakan aplikasi untuk terkoneksi

```
CREATE USER '<USERNAME>'@'<HOST/IP>' IDENTIFIED BY 'password';
```

```
 GRANT SELECT,INSERT,UPDATE,DELETE,CREATE,DROP,ALTER,INDEX on sso.* TO '<USERNAME>'@'<HOST/IP>';
```

```
flush privileges;
```

Untuk melihat grant user dapat dilihat dengan perintah berikut

```
SHOW GRANTS FOR '<USERNAME>'@'<HOST/IP>';
```

Tentunya perintah diatas hanya untuk setting di mysql. Untuk kondisi database yang lain seperti POSTGRESS, NoSQL ataupun REDIS koneksi kurang lebih sama
