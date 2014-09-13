DATE=`date +"%Y%m%d"`

DATEBASE="zhongyuan_security"
FILE="$DATEBASE$DATE.sql"

mysqldump -uroot -proot --databases $DATEBASE > $FILE

DATEBASE="zhongyuan_bbs"
FILE="$DATEBASE$DATE.sql"

mysqldump -uroot -proot --databases $DATEBASE > $FILE

DATEBASE="zhongyuan_sns"
FILE="$DATEBASE$DATE.sql"

mysqldump -uroot -proot --databases $DATEBASE > $FILE