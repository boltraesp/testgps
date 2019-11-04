/system scheduler
add interval=1m name=gps on-event="{\r\
\n:global lat\r\
\n:global lon\r\
\n/system gps monitor once do={\r\
\n:set \$lat \$(\"latitude\")\r\
\n:set \$lon \$(\"longitude\")\r\
\n}\r\
\ntool fetch mode=http url=\"https://github.com/boltraesp/bol.php\" port=443 http\
-method=post http-data=(\"{\\\"lat\\\":\\\"\" . \$lat . \"\\\",\\\"lon\\\":\
\\\"\" . \$lon . \"\\\"}\") http-header-field=\"Content-Type: application/js\
on\"\r\
\n:put (\"{\\\"lat\\\":\\\"\" . \$lat . \"\\\",\\\"lon\\\":\\\"\" . \$lon . \
\"\\\"}\")\r\
\n}" policy=\
ftp,reboot,read,write,policy,test,password,sniff,sensitive,romon \
start-date=may/20/2019 start-time=07:45:41
