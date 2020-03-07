using System;
using System.Collections.Generic;
using System.Linq;
using System.Threading.Tasks;
using Microsoft.AspNetCore.Mvc;
using Microsoft.AspNetCore.Mvc.RazorPages;
using Microsoft.Extensions.Logging;
using Webapp.models;
using Webapp.services;

namespace Webapp.Pages
{
    public class IndexModel : PageModel
    {
        private readonly ILogger<IndexModel> _logger;

        public AccountService accountServices;
        public IEnumerable<account> Accounts { get; private set; }
        public IndexModel(ILogger<IndexModel> logger, AccountService accountService)
        { 
            _logger = logger;
            accountServices = accountService;
        }

        public void OnGet()
        {
            Accounts = accountServices.GetAccounts();
        }
    }
}
