import os
# s = str(subprocess.Popen(["sha256sum.exe", "audit.py"]))
# s = str(os.system("sha256sum.exe audit.py"))
s = os.popen("sha256sum.exe audit.py").read()

n = s.split()
print(n[0])

