using Microsoft.AspNetCore.Hosting;
using System;
using System.Collections.Generic;
using System.IO;
using System.Linq;
using System.Text.Json;
using System.Threading.Tasks;

namespace Webapp.services
{
    public class AccountService
    {

        public AccountService (IWebHostEnvironment webHostEnvironment)
        {
            WebhostEnvironment = webHostEnvironment;
        }

        public IWebHostEnvironment WebhostEnvironment { get; }

        private string AccountFileName
        {
            get { return Path.Combine(WebhostEnvironment.WebRootPath, "data", "account.json"); }
        }

        public IEnumerable<models.account> GetAccounts()
        {
            using (var jsonFileReader = File.OpenText(AccountFileName))
            {
                return JsonSerializer.Deserialize<models.account[]>(jsonFileReader.ReadToEnd(),
                    new JsonSerializerOptions
                    {
                        PropertyNameCaseInsensitive = true
                    });
            }
        }
    }
}
