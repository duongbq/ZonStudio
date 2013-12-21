<VirtualHost *:80>
    ServerAdmin zudio@zonstudio.com
	ServerName zonstudio.local
	ServerAlias www.zonstudio.local

    DocumentRoot "E:/projects/zonstudio.com"
    <Directory "E:/projects/zonstudio.com">
		AllowOverride All
        Order Allow,Deny
        Allow from all
        Require all granted
	</Directory>
    ErrorLog "E:/projects/zonstudio.com/application/logs/error.log"
    CustomLog "E:/projects/zonstudio.com/application/logs/access.log" common
</VirtualHost>