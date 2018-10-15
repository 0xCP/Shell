# loc

Hostloc 手动刷分源码

# hostloc

Hostloc 自动刷分源码，放到宝塔面板计划任务，添加访问Url，可以自动运行

# tz

精简版雅黑探针

# lnmp

lnmp1.4和1.5创建证书的命令不一样了，
lnmp1.4及以下使用，创建证书会失败。

所以这是lnmp1.5版本的一键快速反代
在lnmp1.5脚本的基础上，加上了逗比网站的反代配置

使用方法

```
wget https://soft.mli.ink/lnmp
bash lnmp proxy add
```

覆盖掉原lnmp文件的话，可以直接使用
```
lnmp proxy add
```
```
chmod +x lnmp && mv lnmp /bin/lnmp
```
基本命令和lnmp vhost add 差不多

![lnmp](https://gitlab.com/iyk/shell2/raw/master/img/lnmp.jpg)