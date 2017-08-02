import serial
ser = serial.Serial('/dev/arduino-input', 9600)
ser.write('info')
read_serial=ser.readline()
f = open('get_info.php', 'w')
print >> f, "<?php echo '%s';?>" %read_serial
f.close()




import serial
ser = serial.Serial('/dev/arduino-input', 9600)
ser.write("info")
read_serial=ser.readline()
f = open('get_info.php', 'w')
print >> f, "<?php echo '%s';?>" %read_serial
f.close()


'''
import serial
ser = serial.Serial('/dev/arduino-input', 9600)
ser.write('\n')

import serial
ser = serial.Serial('/dev/arduino-input', 9600)
ser.write('o')
read_serial=ser.readline()
f = open('get_info.php', 'w')
print >> f, "<?php echo '%s';?>" %read_serial
f.close()
'''
