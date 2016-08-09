# Install `rsync` 3.1.2 #

```bash
cd /opt/
wget https://rsync.samba.org/ftp/rsync/src/rsync-3.1.2.tar.gz 
tar -xvzf ./rsync-3.1.2.tar.gz
cd rsync-3.1.2
./configure
make
make install
```
