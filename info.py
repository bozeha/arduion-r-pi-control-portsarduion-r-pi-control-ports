import serial
ser = serial.Serial('/dev/arduino-input', 9600, timeout=3)
ser.write('info')
read_serial=ser.readline()
f = open('get_info.php', 'w')
print >> f, "<?php echo '%s';?>" %read_serial
f.close()
