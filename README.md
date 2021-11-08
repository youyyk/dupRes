# Project-SoftwareEngineer-ResManage
> โปรเจ็คนี้เป็นโปรเจ็คที่เกี่ยวกับการจัดการภายในร้านอาหารสำหรับพนักงาน ผู้จัดการ และเจ้าของใช้ ซึ่งจะค่อนข้างคล้ายกับระบบ POS ร้านอาหารที่คอยจัดการอยู่ภายในร้าน

## รายชื่อผู้จัดทำ
- กันตา คงวัฒนานนท์ 6210450024
- ยุติธร เกรียงไกรเลิศ 6210450148
- ณิชนันทน์ จตุปาริสุทธิศิล 6210450571
- วนิดา ธรรมปัทม์ 6210450717
- ไอลดา พินิจศรศาสตร์ 6210450822
- โยษิตา จินดา 6210451411
## Install
```
git clone https://github.com/youyyk/ProjectSE-Laravel.git
```
สร้างไฟล์ .env โดย copy จาก .env.example และแก้ไขส่วนของ Database กับ Line Token
> สามารถอ่านเรื่อง Line Notify ได้ที่ https://github.com/phattarachai/line-notify
```
composer install
npm install
php artisan key:generate
php artisan migrate
php artisan migrate:refresh --seed
php artisan storage:link
```

### Run
```
php artisan serve
```

### Features
มีผู้ใช้ 3 ประเภท
1. พนักงานหน้าร้าน (FrontWorker)
   - สามารถสั่งอาหารได้ที่หน้ารายการโต๊ะ โดยสามารถเลือกได้ว่าจะสั่งกลับบ้านหรือทานที่ร้าน
     - สั่งโดยกดที่โต๊ะ จะสามารถสั่งได้ทั้ง 2 แบบ
     - สั่งโดยกดที่ปุ่มสั่งกลับบ้าน จะสามารถสั่งกลับบ้านได้เท่านั้น
   - สามารถยกเลิกเมนูในบิลได้ ถ้าเมนูนั้นยังไม่ได้เริ่มทำ
     - บิลของทานที่ร้าน ให้กดที่โต๊ะ แล้วเลือก "บิลทั้งหมด" เว็บจะแสดงรายการบิลทั้งหมดของโต๊ะนั้น แล้วจึงกดยกเลิกที่เมนูที่ต้องการยกเลิกได้
     - บิลของสั่งกลับบ้าน ให้กดที่ "บิลกลับบ้านทั้งหมด" เว็บจะแสดงรายการบิลกลับบ้านทั้งหมดที่ยังไม่ได้ชำระเงิน แล้วจึงกดยกเลิกที่เมนูที่ต้องการยกเลิกได้
   - สามารถชำระเงินให้ลูกค้าได้
     - บิลของทานที่ร้าน ให้กดที่โต๊ะ แล้วเลือก "บิลทั้งหมด" จะมีปุ่มชำระเงิน ซึ่งจะกดได้ก็ต่อเมื่อทุกเมนูในทุกบิลทำเสร็จหมดแล้ว
     - บิลของสั่งกลับบ้าน ให้กดที่ "บิลกลับบ้านทั้งหมด" จะมีปุ่มชำระเงินที่แต่ละบิล ซึ่งสามารถกดได้ทุกเมื่อ
   - สามารดูรายละเอียดของบิลได้ที่หน้ารายการบิล
2. พนักงานหลังร้าน (BackWorker)
   - สามารถกดปุ่มเพื่อเปลี่ยนสถานะของแต่ละเมนูในแต่ละบิลได้ โดยจะมีแค่บิลที่ยังทำไม่เสร็จเท่านั้น
     - โดยจะแสดงแค่เพียงเมนูที่อยู่ในส่วนรับผิดชอบของพนักงานตามแผนกที่อยู่ ยกเว้นแอดมินเห็นได้ทั้งหมด 
     - เมนูที่ยังไม่ได้เริ่มทำ(มีสถานะเป็น 'notStarted') ปุ่มจะเขียนว่า "เริ่ม" ให้กดได้ ซึ่งเมื่อกดแล้วสถานะจะเปลี่ยนเป็น 'inProcess'
     - ถ้าเมนูมีสถานะเป็น 'inProcess' ปุ่มจะเขียนว่า "เสร็จ" ให้กดได้ ซึ่งเมื่อกดแล้วสถานะจะเปลี่ยนเป็น 'finish'
     - ถ้าเมนูมีสถานะเป็น 'finish' ปุ่มจะเปลี่ยนเป็นปุ่มที่กดไม่ได้
     - ถ้าทุกเมนูในบิลถูกเปลี่ยนสถานะเป็น 'finish' ทั้งหมดแล้ว บิลจะหายไปจากหน้า
3. แอดมิน (Admin)
   - สามารถเข้าถึงข้อมูลของผู้ใช้งานได้ทุกคน
   - สามารถจัดการข้อมูลผู้ใช้งาน รายการอาหาร แผนกครัว และโต๊ะ(หน้าการจัดการโต๊ะ)
   - สามารถดูกราฟสรุปยอดขายตามวัน เดือน และปี ได้ใน 2 รูปแบบ คือ กราฟเส้นและกราฟแท่ง
   - สามารถส่งแจ้งเตือนในไลน์ได้ โดยสามารถส่งยอดสรุปประจำวัน(กดปุ่มยอดประจำวันนี้ในหน้าสรุปยอด) และแจ้งเตือนเมื่อมีการเพิ่มผู้ใช้งาน

### Example Account

Email         | Password | Type        | Department        |
--------------|----------|-------------|-------------|
admin@res.com | 12345678 | Admin       | All
lina@res.com  | 12345678 | FrontWorker | -
dew@res.com   | 12345678 | FrontWorker | -
peang@res.com | 12345678 | BackWorker  | ครัวไทย
ging@res.com  | 12345678 | BackWorker  | ของหวาน
ice@res.com  | 12345678 | BackWorker  | นานาชาติ
backworker@res.com  | 12345678 | BackWorker  | เครื่องดื่ม

### Unit Testing
ต้องทำการเพิ่ม database สำหรับการ testing แก้ใน env
![alt text](https://github.com/youyyk/ProjectSE-Laravel/blob/youyyk/fileForSE/UnitTesting.png?raw=true)
### jMeter
ไฟล์ .jmx อยู่ในโฟลเดอร์ fileForSE
![alt text](https://github.com/youyyk/ProjectSE-Laravel/blob/youyyk/fileForSE/JMeter.png?raw=true)
