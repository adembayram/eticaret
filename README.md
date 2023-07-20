# E-Ticaret Projesi

Bu proje, Laravel framework'ü ile yazılmış basit bir e-ticaret sitesidir. Giriş ve yönetim paneli Jetstream kullanılarak oluşturulmuştur.

## Özellikler

- Kullanıcılar ürünleri kategorilere göre filtreleyebilir ve arama yapabilir.
- Sepet özelliği sayesinde kullanıcılar istedikleri ürünleri sepete ekleyebilir ve kolayca yönetebilir.
- Sipariş ve ödeme yapısı, PAYTR entegrasyonu sayesinde güvenli ve hızlı bir alışveriş deneyimi sunar.
- Yönetici sayfaları, site yöneticilerinin kullanıcıları, kategorileri ve ürünleri kolayca yönetmelerini sağlar.

## Kurulum

1. Kodları bilgisayarınıza indirin veya klonlayın.
2. Konsol ekranında `composer install` ve  `npm install` komutunu çalıştırın.
3. `.env.example` dosyasının adını `.env` olarak değiştirin.
4. `.env` dosyası içerisinde yer alan DB_ parametrelerini kendi veritabanı bilgilerinizle uyumlu şekilde ayarlayın.
5. Veritabanı kurulumu için `php artisan migrate` komutunu çalıştırın. Eğer rastgele veri eklemek isterseniz `php artisan migrate --seed` komutunu kullanabilirsiniz.
6. Konsol ekranında `php artisan key:generate` komutunu çalıştırın.
7. Projenizi çalıştırmak için `php artisan serve` komutunu kullanın.

## Uyarı

Proje çalıştırıldığında hata alıyorsanız, `App/Providers/AppServiceProvider.php` dosyası içerisinde bulunan aşağıdaki satırları yorum satırından çıkartmayı unutmayın:

```php
$settings = Setting::first();
$menus = Menu::all();
view()->share(compact('settings', 'menus'));


## Bölümler

Proje aşağıdaki bölümleri içermektedir:

- Kategori yapıları
- Ürün yapısı
- Kullanıcı yapısı
- Sepet yapısı
- Sipariş ve ödeme yapısı (PAYTR destekli)

## Yönetici Sayfaları

Proje yönetici sayfaları içermektedir ve aşağıdaki yönetim işlemlerini gerçekleştirebilirsiniz:

- Kullanıcı Yönetimi: Yeni kullanıcılar ekleyebilir, mevcut kullanıcıları düzenleyebilir veya silebilirsiniz.
- Kategori Yönetimi: Ürün kategorileri oluşturabilir, düzenleyebilir ve silebilirsiniz.
- Ürün Yönetimi: Yeni ürünler ekleyebilir, ürünleri düzenleyebilir ve silebilirsiniz.

## Katkıda Bulunma

Bu proje açık kaynaklıdır ve katkıda bulunmaktan mutluluk duyarız. Lütfen pull request göndermeden önce değişikliklerinizi açıklayıcı bir şekilde belirttiğinizden emin olun.

## Lisans

Bu proje MIT Lisansı ile lisanslanmıştır. Detaylı bilgi için [LİSANS DOSYASI](LICENSE) dosyasını inceleyebilirsiniz.
