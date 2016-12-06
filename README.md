# my_test
my first github 
利用git托管代码.
1,本地仓库master与其他分支的区别:
	1.1,所有分支都可以指定仓库(主机)/分支进行拉取，如: 
		git checkout dev
		git pull origin master

		git checkout debug
		git pull origin master

		pull之后会与目前线上的分支保持一致
	1.2, 默认情况下只有master分支才能够直接push到跟踪分支
		git checkout dev
		git push origin master 
		此时push 将不生效

		git checkout master
		git merge dev
		git push origin master
		此时才生效
2,关于冲突
	当不同分支修改同一行代码时将产生冲突;
	当本地主分支和线上主分支修改同一段代码时将产生冲突；
	
	git的冲突似乎很常见;
