$hostsPath = 'C:\Windows\System32\drivers\etc\hosts'
$entry = '127.0.0.1 perfumeria.test'

if (-not (Select-String -LiteralPath $hostsPath -Pattern 'perfumeria\.test' -Quiet)) {
    Add-Content -LiteralPath $hostsPath -Value "`r`n$entry"
}

ipconfig /flushdns
Write-Host "Dominio perfumeria.test configurado. Reinicia Apache en Laragon y abre http://perfumeria.test"
