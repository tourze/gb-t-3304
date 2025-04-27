# GB/T 3304 主要工作流程（Mermaid）

```mermaid
graph TD
    A[应用获取民族数据] --> B[调用 Nationality 枚举]
    B --> C[获取数字代码 value]
    B --> D[获取中文名称 getLabel()]
    B --> E[获取双字母代码 toCode()]
    B --> F[获取所有民族列表 getItems()]
    F --> G[用于表单/下拉选择]
    C --> H[存储到数据库]
    E --> I[用于接口/标准化输出]
```

---

## 说明

- 应用通过 Nationality 枚举统一获取民族相关数据。
- 支持代码、名称、双字母等多种场景。
- 适用于表单、接口、数据库等多种业务需求。
